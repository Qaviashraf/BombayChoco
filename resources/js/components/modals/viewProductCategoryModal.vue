<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewProductCategoryModal"
      role="dialog"
      aria-labelledby="viewProductCategory"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewProductCategoryModal">
              {{ $t("message.VIEW_PRODUCT_CATEGORY") }}:
              {{ productCategoryData.name }}
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
                  {{ productCategoryData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ productCategoryData.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PARENT_CATEGORY") }}</th>
                    <td v-if="productCategoryData.parent_category && productCategoryData.parent_category.name">{{productCategoryData.parent_category.name }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>Color Code</th>
                    <td> {{ productCategoryData.color_code }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.DESCRIPTION") }}</th>
                    <td>{{ productCategoryData.description }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td>
                      <img
                        v-bind:src="
                          'images/product-categories/' + productCategoryData.image
                        "
                        width="50"
                        alt="Photo not found"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.BANNER_IMAGE") }}</th>
                    <td>
                      <img
                        v-bind:src="
                          'images/product-categories/' + productCategoryData.banner_image
                        "
                        width="50"
                        alt="Photo not found"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="productCategoryData.created_by">
                      {{ productCategoryData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="productCategoryData.created_at">
                      {{ productCategoryData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="productCategoryData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td v-if="productCategoryData.updated_by">
                      {{ productCategoryData.updated_by.name }}
                    </td>
                  </tr>
                  <tr v-if="productCategoryData.updated_by">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td>{{ productCategoryData.updated_at | formatDateTime }}</td>
                  </tr>
                </tbody>
              </table>
              <h2>SEO Section</h2>
            <table class="table table-hover table-bordered dark-border">
              <tbody>
                <tr>
                  <th>Meta Title</th>
                  <td>{{ productCategoryData.meta_title }}</td>
                </tr>
                <tr>
                  <th>Meta Description</th>
                  <td>{{ productCategoryData.meta_description }}</td>
                </tr>
                
                <tr>
                  <th>Slug</th>
                  <td>
                    <a :href="'https://bombaychocnnuts.com/products/' + productCategoryData.slug" target="_blank">
                      https://bombaychocnnuts.com/products/{{ productCategoryData.slug }}
                    </a>
                  </td>
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
  name: "viewProductCategoryModal",
  props: ["productCategoryData"],
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
