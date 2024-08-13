<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewCityModal"
      role="dialog"
      aria-labelledby="viewCity"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewCityModal">
              {{ $t("message.VIEW_CITY") }}:
              {{ cityData.name }}
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
                  {{ $t("message.VIEW_CITY") }}:
                  {{ cityData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ cityData.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.DELIVERY_CHARGES") }}</th>
                    <td>{{ cityData.delivery_price }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="cityData.created_by">{{cityData.created_by.name}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="cityData.updated_by">
                      <th>{{ $t("message.UPDATED_BY") }}</th>
                      <td>{{cityData.updated_by.name}}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="cityData.created_at">
                      {{ cityData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="cityData.updated_at">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td>{{ cityData.updated_at | formatDateTime }}</td>
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
  name: "viewCityModal",
  props: ["cityData"],
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
