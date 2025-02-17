<template>
  <div class="autocomplete">
    <div class="autocomplete__box" :class="{'autocomplete__searching' : showResults}">

      <!-- <img v-if="!isLoading" class="autocomplete__icon" src="images/autoComplete/search.svg">
      <img v-else class="autocomplete__icon animate-spin" src="images/autoComplete/loading.svg"> -->

      <div class="autocomplete__inputs">
        <!-- <input
          v-model="display"
          :placeholder="placeholder"
          :disabled="disableInput"
          :maxlength="maxlength"
          :class="inputClass"
          @input="search"
          @keydown.enter="enter"
          @keydown.tab="close"
          @keydown.up="up"
          @keydown.down="down"
          @keydown.esc="close"
          @focus="focus"
          @blur="blur"
          @keyup="setValue"
          type="text"
          autocomplete="off">
        <input :name="name" type="hidden" :value="value"> -->
        <v-text-field 
         v-model="display"
          :placeholder="placeholder"
          :disabled="disableInput"
          :maxlength="maxlength"
          :class="inputClass"
          :label="$t('message.SEARCH_PRODUCTS_TO_ADD')"
          @input="search"
          @keydown.enter="enter"
          @keydown.tab="close"
          @keydown.up="up"
          @keydown.down="down"
          @keydown.esc="close"
          @focus="focus"
          @blur="blur"
          @keyup="setValue"
          type="text"
          autocomplete="off"
        >
        </v-text-field>
      </div>

      <!-- clearButtonIcon -->
      <span v-show="!disableInput && !isEmpty && !isLoading && !hasError" class="autocomplete__icon autocomplete--clear" @click="clear">
        <span v-if="clearButtonIcon" :class="clearButtonIcon"></span>
        <img v-else src="images/autoComplete/close.svg">
      </span>
    </div>

    <ul v-show="showResults" class="autocomplete__results" :style="listStyle">
      <slot name="results">
        <!-- error -->
        <li v-if="hasError" class="autocomplete__results__item autocomplete__results__item--error">{{ error }}</li>

        <!-- results -->
        <template v-if="!hasError">
          <slot name="firstResult"></slot>
          <li
              v-for="(result, key) in results"
              :key="key"
              @click.prevent="select(result)"
              class="autocomplete__results__item"
              :class="{'autocomplete__selected' : isSelected(key) }"
              v-html="formatDisplay(result)">
          </li>
          <slot name="lastResult"></slot>
        </template>

        <!-- no results -->
        <li v-if="noResultMessage" class="autocomplete__results__item autocomplete__no-results">
          <slot name="noResults">No Results.</slot>
        </li>
      </slot>
    </ul>
  </div>
</template>

<script type="text/babel">
import debounce from 'lodash/debounce'
export default {
  props: {
    /**
     * Data source for the results
     *   `String` is a url, typed input will be appended
     *   `Function` received typed input, and must return a string; to be used as a url
     *   `Array` and `Object` (see `results-property`) are used directly
     */
    source: {
      type: [String, Function, Array, Object],
      required: true
    },
    /**
     * http method
     */
    method: {
      type: String,
      default: 'get'
    },
    /**
     * Input placeholder
     */
    placeholder: {
      default: 'Search'
    },
    /**
     * Preset starting value
     */
    initialValue: {
      type: [String, Number]
    },
    /**
     * Preset starting display value
     */
    initialDisplay: {
      type: String
    },
    /**
     * CSS class for the surrounding input div
     */
    inputClass: {
      type: [String, Object]
    },
    /**
     * To disable the input
     */
    disableInput: {
      type: Boolean
    },
    /**
     * name property of the input holding the selected value
     */
    name: {
      type: String
    },
    /**
     * api - property of results array
     */
    resultsProperty: {
      type: String
    },
    /**
     * Results property used as the value
     */
    resultsValue: {
      type: String,
      default: 'id'
    },
    /**
     * Results property used as the display
     */
    resultsDisplay: {
      type: [String, Function],
      default: 'name'
    },
    /**
     * Callback to format the server data
     */
    resultsFormatter: {
      type: Function
    },
    /**
     * Whether to show the no results message
     */
    showNoResults: {
      type: Boolean,
      default: true
    },
    /**
     * Additional request headers
     */
    requestHeaders: {
      type: Object
    },
    /**
     * Credentials: same-origin, include, *omit
     */
    credentials: {
      type: String
    },
    /**
     * Optional clear button icon class
     */
    clearButtonIcon: {
      type: String
    },
    /**
     * Optional max input length
     */
    maxlength: {
      type: Number
    },
  },
  data () {
    return {
      value: null,
      display: null,
      results: null,
      selectedIndex: null,
      loading: false,
      isFocussed: false,
      error: null,
      selectedId: null,
      selectedDisplay: null,
      eventListener: false
    }
  },
  computed: {
    showResults () {
      return Array.isArray(this.results) || this.hasError
    },
    noResults () {
      return Array.isArray(this.results) && this.results.length === 0
    },
    noResultMessage () {
      return this.noResults &&
        !this.isLoading &&
        this.isFocussed &&
        !this.hasError &&
        this.showNoResults
    },
    isEmpty () {
      return !this.display
    },
    isLoading () {
      return this.loading === true
    },
    hasError () {
      return this.error !== null
    },
    listStyle () {
      if (this.isLoading) {
        return {
          color: '#ccc'
        }
      }
    }
  },
  methods: {
    /**
     * Search wrapper method
     */
    search () {
      this.selectedIndex = null
      switch (true) {
        case typeof this.source === 'string':
          // No resource search with no input
          if (!this.display || this.display.length < 1) {
            return
          }
          return this.resourceSearch(this.source + this.display)
        case typeof this.source === 'function':
          // No resource search with no input
          if (!this.display || this.display.length < 1) {
            return
          }
          return this.resourceSearch(this.source(this.display))
        case Array.isArray(this.source):
          return this.arrayLikeSearch()
        default:
          throw new TypeError()
      }
    },
    /**
     * Debounce the typed search query before making http requests
     * @param {String} url
     */
    resourceSearch: debounce(function (url) {
      if (!this.display) {
        this.results = []
        return
      }
      this.loading = true
      this.setEventListener()
      this.request(url)
    }, 200),
    /**
     * Make an http request for results
     * @param {String} url
     */
    request (url) {
      let promise = fetch(url, {
        method: this.method,
        credentials: this.getCredentials(),
        headers: this.getHeaders()
      })
      return promise
        .then(response => {
          if (response.ok) {
            this.error = null
            return response.json()
          }
          throw new Error('Network response was not ok.')
        })
        .then(response => {
          this.results = this.setResults(response)
          this.emitRequestResultEvent()
          this.loading = false
        })
        .catch(error => {
          this.error = error.message
          this.loading = false
        })
    },
    /**
     * Set some default headers and apply user supplied headers
     */
    getHeaders () {
      const headers = {
        'Accept': 'application/json, text/plain, */*'
      }
      if (this.requestHeaders) {
        for (var prop in this.requestHeaders) {
          headers[prop] = this.requestHeaders[prop]
        }
      }
      return new Headers(headers)
    },
    /**
     * Set default credentials and apply user supplied value
     */
    getCredentials () {
      let credentials = 'same-origin'
      if (this.credentials) {
        credentials = this.credentials
      }
      return credentials
    },
    /**
     * Set results property from api response
     * @param {Object|Array} response
     * @return {Array}
     */
    setResults (response) {
      if (this.resultsFormatter) {
        return this.resultsFormatter(response)
      }
      if (this.resultsProperty && response[this.resultsProperty]) {
        return response[this.resultsProperty]
      }
      if (Array.isArray(response)) {
        return response
      }
      return []
    },
    /**
     * Emit an event based on the request results
     */
    emitRequestResultEvent () {
      if (this.results.length === 0) {
        this.$emit('noResults', {query: this.display})
      } else {
        this.$emit('results', {results: this.results})
      }
    },
    /**
     * Search in results passed via an array
     */
    arrayLikeSearch () {
      this.setEventListener()
      if (!this.display) {
        this.results = this.source
        this.$emit('results', {results: this.results})
        this.loading = false
        return true
      }
      this.results = this.source.filter((item) => {
        return this.formatDisplay(item).toLowerCase().includes(this.display.toLowerCase())
      })
      this.$emit('results', {results: this.results})
      this.loading = false
    },
    /**
     * Select a result
     * @param {Object}
     */
    select (obj) {
      if (!obj) {
        return
      }
      this.value = (this.resultsValue && obj[this.resultsValue]) ? obj[this.resultsValue] : obj.id
      this.display = this.formatDisplay(obj)
      this.selectedDisplay = this.display
      this.$emit('selected', {
        value: this.value,
        display: this.display,
        selectedObject: obj
      })
      this.$emit('input', this.value)
      this.close()
    },
    /**
     * @param  {Object} obj
     * @return {String}
     */
    formatDisplay (obj) {
      switch (typeof this.resultsDisplay) {
        case 'function':
          return this.resultsDisplay(obj)
        case 'string':
          if (!obj[this.resultsDisplay]) {
            throw new Error(`"${this.resultsDisplay}" property expected on result but is not defined.`)
          }
          return obj[this.resultsDisplay]
        default:
          throw new TypeError()
      }
    },
    /**
     * Register the component as focussed
     */
    focus () {
      this.isFocussed = true;
    },
    /**
     * Remove the focussed value
     */
    blur () {
      this.isFocussed = false
    },
    /**
     * Is this item selected?
     * @param {Object}
     * @return {Boolean}
     */
    isSelected (key) {
      return key === this.selectedIndex
    },
    /**
     * Focus on the previous results item
     */
    up () {
      if (this.selectedIndex === null) {
        this.selectedIndex = this.results.length - 1
        return
      }
      this.selectedIndex = (this.selectedIndex === 0) ? this.results.length - 1 : this.selectedIndex - 1
    },
    /**
     * Focus on the next results item
     */
    down () {
      if (this.selectedIndex === null) {
        this.selectedIndex = 0
        return
      }
      this.selectedIndex = (this.selectedIndex === this.results.length - 1) ? 0 : this.selectedIndex + 1
    },
    /**
     * Select an item via the keyboard
     */
    enter () {
      if (this.selectedIndex === null) {
        this.$emit('nothingSelected', this.display)
        return
      }
      this.select(this.results[this.selectedIndex])
      this.$emit('enter', this.display)
    },
    /**
     * Clear all values, results and errors
     */
    clear () {
      this.display = null
      this.value = null
      this.results = null
      this.error = null
      this.$emit('clear')
    },
    /**
     * Close the results list. If nothing was selected clear the search
     */
    close () {
      if (!this.value || !this.selectedDisplay) {
        this.clear()
      }
      if (this.selectedDisplay !== this.display && this.value) {
        this.display = this.selectedDisplay
      }
      this.results = null
      this.error = null
      this.removeEventListener()
      this.$emit('close')
    },
    /**
     * Add event listener for clicks outside the results
     */
    setEventListener () {
      if (this.eventListener) {
        return false
      }
      this.eventListener = true
      document.addEventListener('click', this.clickOutsideListener, true)
      return true
    },
    /**
     * Remove the click event listener
     */
    removeEventListener () {
      this.eventListener = false
      document.removeEventListener('click', this.clickOutsideListener, true)
    },
    /**
     * Method invoked by the event listener
     */
    clickOutsideListener (event) {
      if (this.$el && !this.$el.contains(event.target)) {
        this.close()
      }
    },

    setValue()
    {
        Fire.$emit('getDataFromAutoCommplete', this.display);
    }
  },
  mounted () {
    this.value = this.initialValue
    this.display = this.initialDisplay
    this.selectedDisplay = this.initialDisplay
  }
}
</script>
