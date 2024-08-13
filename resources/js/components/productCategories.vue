<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('product_categories')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">
                  {{ $t("message.PRODUCT_CATEGORIES") }}
                </h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button
                  class="btn btn-success float-right"
                  @click="addProductCategory"
                  v-if="is('Super Admin') || can('create_product_category')"
                >
                  {{ $t("message.CREATE_PRODUCT_CATEGORY") }}
                  <i class="fas fa-plus fa-fw"></i>
                </button>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Dropdown -->
                    <!-- <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Action 1</a></li>
                        <li><a class="dropdown-item" href="#">Action 2</a></li>
                        <li><a class="dropdown-item" href="#">Action 3</a></li>
                      </ul>
                    </div> -->

                    <!-- Search Bar -->
                    <div class="card-tools">
                      <form @submit.prevent>
                        <v-text-field
                          class="m-0 p-0"
                          v-model="search"
                          append-icon="mdi-magnify"
                          label="Search"
                          single-line
                          hide-details
                        ></v-text-field>
                      </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <v-data-table
                      :headers="headers"
                      :items="productCategories.data ? productCategories.data : productCategories"
                      :server-items-length="productCategories.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <!-- Custom slot for displaying whether the product is displayed on the home page -->
                      <template #item.is_display_on_home="{item}">
                        <span v-if="item.is_display_on_home == 1">
                          {{$t('message.YES')}}
                        </span>
                        <span v-else>{{$t('message.NO')}}</span>
                      </template>
                      <!-- Action buttons for each product category -->
                      <template v-slot:item.actions="{ item }">
                        <v-icon color="green" class="edit-icon mr-2" small @click="viewProductCategory(item)">
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editProductCategory(item)"
                          v-if="is('Super Admin') || can('edit_product_category')"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteProductCategory(item.id)"
                          v-if="is('Super Admin') || can('delete_product_category')"
                        >
                          mdi-delete
                        </v-icon>
                      </template>
                    </v-data-table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.content -->
        <addEditProductCategoryModal />
        <viewProductCategoryModal :productCategoryData="productCategoryInfo" />
      </div>
      <div class="unauthorized-text" v-else>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 unauthorized">
              <v-alert color="red lighten-2" dark>
                {{ $t("message.UNAUTHORIZED") }}
              </v-alert>
            </div>
          </div>
        </div>
      </div>
    </div>
  </v-app>
</template>


<script>
import addEditProductCategoryModal from "./modals/addEditProductCategoryModal.vue";
import viewProductCategoryModal from "./modals/viewProductCategoryModal.vue";
export default {
  data() {
    return {
      form: new form(),
      productCategories: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      productCategoryInfo: {},
      headers: [
        { text: this.$t("message.NAME"), value: "name" },
        { text: this.$t("message.CREATED_BY"), value: "created_by.name" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditProductCategoryModal,
    viewProductCategoryModal,
  },
  watch: {
    //DataTable watcher!
    options: {
      handler() {
        this.getResults(
          this.options.page ? this.options.page : null,
          this.options.itemsPerPage ? this.options.itemsPerPage : null
        );
      },
      deep: true,
    },
    search() {
      this.getResults();
    },
  },
  methods: {
    getResults(page = 1, rows = 10, sortBy = null, sortDesc = null) {
      if (this.is("Super Admin") || this.can("product_categories")) {
        this.$Progress.start();
        this.loading = true;
        this.curpage = page;
        if (this.options.sortBy && this.options.sortBy.length > 0) {
          this.sortBy = this.options.sortBy[0];
        } else {
          this.sortBy = "";
        }
        if (this.options.sortDesc && this.options.sortDesc.length > 0) {
          this.sortDesc = this.options.sortDesc[0];
        } else {
          this.sortDesc = "";
        }
        axios
          .get(
            "api/productCategories?page=" +
              page +
              "&search=" +
              this.search +
              "&numRows=" +
              rows +
              "&sortBy=" +
              this.sortBy +
              "&sortDesc=" +
              this.sortDesc
          )
          .then((response) => {
            this.productCategories = response.data;
            this.$Progress.finish();
            this.loading = false;
          })
          .catch(() => {
            this.$Progress.fail();
            this.loading = false;
            toast.fire({
              icon: "error",
              title: this.$t("message.SOMETHING_WENT_WRONG"),
            });
          });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },
    deleteProductCategory(id) {
      if (this.is("Super Admin") || this.can("delete_product_category")) {
        swal
          .fire({
            title: this.$t("message.CONFIRM"),
            text: this.$t("message.DELETE_MESSAGE_REVERT"),
            type: "warning",
            showCancelButton: true,
            cancelButtonText: this.$t('message.CANCEL'),
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
          })
          .then((result) => {
            this.$Progress.start();
            if (result.value) {
              // Send request to the server
              this.form
                .delete("api/productCategories/" + id)
                .then(() => {
                  this.productCategories.total -= 1;
                  Fire.$emit("reloadProductCategories");
                  this.$Progress.finish();
                  swal.fire(
                    this.$t("message.DELETED"),
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                })
                .catch(() => {
                  this.$Progress.fail();
                  swal.fire(
                    this.$t("message.FAILED"),
                    this.$t("message.DELETE_MESSAGE_ERROR"),
                    "warning"
                  );
                });
            }
          });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    addProductCategory() {
      if (this.is("Super Admin") || this.can("create_product_category")) {
        $("#addEditProductCategoryModal").modal("show");
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    editProductCategory(productCategory) {
      if (this.is("Super Admin") || this.can("edit_product_category")) {
        this.productCategoryInfo = productCategory;
        $("#addEditProductCategoryModal").modal("show", productCategory);
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    viewProductCategory(productCategory) {
      this.productCategoryInfo = productCategory;
      $("#viewProductCategoryModal").modal("show", productCategory);
    },
  },
  created() {
    Fire.$on("reloadProductCategories", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>
