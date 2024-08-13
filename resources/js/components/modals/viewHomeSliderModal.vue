<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewHomeSliderModal"
      role="dialog"
      aria-labelledby="viewHomeSlider"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewHomeSliderModal">
              {{ $t("message.VIEW_HOME_SLIDER") }}:
              {{ homeSliderData.title }}
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Print Data -->
            <div id="printData">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading">
                  {{ $t("message.VIEW_HOME_SLIDER") }}:
                  {{ homeSliderData.title }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.TITLE") }}</th>
                    <td>{{ homeSliderData.title }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td>
                      <img
                        v-bind:src="
                          'images/home-sliders/' + homeSliderData.image
                        "
                        width="15%"
                        alt="Photo not found"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.REDIRECT_TO") }}</th>
                    <td v-if="homeSliderData.redirect_to">{{ homeSliderData.redirect_to }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="homeSliderData.redirect_to == 'Product'">
                    <th>{{ $t("message.PRODUCT") }}</th>
                    <td v-if="homeSliderData.product">{{ homeSliderData.product.name }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="homeSliderData.redirect_to == 'Category'">
                    <th>{{ $t("message.CATEGORY") }}</th>
                    <td v-if="homeSliderData.product_category">{{ homeSliderData.product_category.name }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="homeSliderData.created_by">
                      {{ homeSliderData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="homeSliderData.created_at">
                      {{ homeSliderData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="homeSliderData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td v-if="homeSliderData.updated_by">
                      {{ homeSliderData.updated_by.name }}
                    </td>
                  </tr>
                  <tr v-if="homeSliderData.updated_by">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td>{{ homeSliderData.updated_at | formatDateTime }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewHomeSliderModal",
  props: ["homeSliderData"],
  data() {
    return {};
  },
  components: {
    printHeader,
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printData");
    },
  },
};
</script>
