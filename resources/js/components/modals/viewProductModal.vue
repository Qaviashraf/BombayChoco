<template>
  <div>
    <!-- Modal -->
    <div class="modal fade" id="viewProductModal" role="dialog" aria-labelledby="viewProduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewProductModal">
              {{ $t("message.VIEW_PRODUCT") }}:
              {{ productData.title }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Print Data -->
            <div id="printData">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading">
                  {{ $t("message.VIEW_PRODUCT") }}:
                  {{ productData.title }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.CODE") }}</th>
                    <td>{{ productData.code ? productData.code : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ productData.title }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.IS_DISABLED") }}</th>
                    <td v-if="productData.is_disabled == 1">{{ $t('message.YES') }}</td>
                    <td v-else>{{ $t('message.NO') }}</td>
                  </tr>
                  <tr>
                    <th>Stock</th>
                    <td v-if="productData.stock == 1">{{ $t('message.YES') }}</td>
                    <td v-else>{{ $t('message.NO') }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PRODUCT_CATEGORY") }}</th>
                    <td v-if="productData.product_category">
                      {{ productData.product_category.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>Color Code</th>
                    <td> {{ productData.color_code }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PRODUCT_FLAVOUR") }}</th>
                    <td v-if="productData.product_flavour">
                      {{ productData.product_flavour.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.FEATURED_IMAGE") }}</th>
                    <td v-if="productData.photo">
                      <span>
                        <img v-bind:src="'images/product-images/' + productData.photo
                          " class="mr-3" width="50" alt="Banner not found" />
                        <a download :href="'images/product-images/' + productData.photo
                          ">
                          <i class="fa fa-download" aria-hidden="true"></i></a>
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PRODUCT_IMAGES") }}</th>
                    <td v-if="productData.product_images != ''">
                      <span v-for="data in productData.product_images" :key="data.image">
                        &nbsp;
                        <img v-bind:src="'images/product-images/' + data.image
                          " class="mr-3" width="50" alt="Banner not found" />
                        <a download :href="'images/product-images/' + data.image
                          ">
                          <i class="fa fa-download" aria-hidden="true"></i></a>
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.DESCRIPTION") }}</th>
                    <td v-if="productData.description">{{ productData.description }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="productData.created_by">
                      {{ productData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="productData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ productData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="productData.created_at">
                      {{ productData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="productData.updated_at">
                      {{ productData.updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <!-- Product Variants Table -->
              <h2> {{ $t("message.PRODUCT_VARIANTS") }} </h2>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>
                    <label>{{ $t("message.BAR_CODE") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.QUANTITY") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.SALE_PRICE") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.WEIGHT") }}</label>
                  </th>
                </tr>
                <tbody>
                  <tr v-for="(data,
                    index) in productData.product_variants" :key="index">
                    <td v-if="data.bar_code">
                      {{ data.bar_code }}
                    </td>
                    <td v-else>-</td>

                    <td v-if="data.quantity">
                      {{ data.quantity }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.sale_price">
                      {{ data.sale_price }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.weight">
                      {{ data.weight }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <h2>SEO Section</h2>
              <table class="table table-hover table-bordered dark-border">
                <tbody>
                  <tr>
                    <th>Meta Title</th>
                    <td>{{ productData.meta_title }}</td>
                  </tr>
                  <tr>
                    <th>Meta Description</th>
                    <td>{{ productData.meta_description }}</td>
                  </tr>
                  <tr>
                    <th>More Information</th>
                    <td>{{ productData.more_info }}</td>
                  </tr>
                  <tr>
                    <th>One Line Description</th>
                    <td>{{ productData.one_line_description }}</td>
                  </tr>
                  <tr>
                    <th>Slug</th>
                    <td v-if="productData.product_category">
                      <a :href="'https://bombaychocnnuts.com/' + productData.product_category.slug + '/' + productData.slug"
                        target="_blank">
                        https://bombaychocnnuts.com/{{ productData.product_category.slug }}/{{ productData.slug }}
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
  name: "viewProductModal",
  props: ["productData"],
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