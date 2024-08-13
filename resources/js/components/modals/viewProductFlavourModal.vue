<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewProductFlavourModal"
      role="dialog"
      aria-labelledby="viewProductFlavour"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewProductFlavourModal">
              {{ $t("message.VIEW_PRODUCT_CATEGORY") }}:
              {{ productFlavourData.name }}
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
                  {{ $t("message.VIEW_PRODUCT_CATEGORY") }}:
                  {{ productFlavourData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ productFlavourData.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td>
                      <img
                        v-bind:src="
                          'images/product-flavours/' + productFlavourData.image
                        "
                        width="50"
                        alt="Photo not found"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="productFlavourData.created_by">
                      {{ productFlavourData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="productFlavourData.created_at">
                      {{ productFlavourData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="productFlavourData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td v-if="productFlavourData.updated_by">
                      {{ productFlavourData.updated_by.name }}
                    </td>
                  </tr>
                  <tr v-if="productFlavourData.updated_by">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td>{{ productFlavourData.updated_at | formatDateTime }}</td>
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
  name: "viewProductFlavourModal",
  props: ["productFlavourData"],
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
