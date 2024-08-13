<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('products')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.PRODUCTS") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="addProduct" v-if="(is('Super Admin') || can('create_product'))">
                  {{ $t("message.CREATE_PRODUCT") }}
                  <i class="fas fa-plus fa-fw"></i>
                </button>
                <!-- <button class="btn btn-info float-right mr-2" @click="importExcelFile" v-if="(is('Super Admin') || can('edit_product'))">
                  {{ $t("message.IMPORT_EXCEL_SHEET") }}
                  <i class="fas fa-file fa-fw"></i>
                </button> -->
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
                  <div class="card-header">
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
                      :items="products.data ? products.data : products"
                      :server-items-length="products.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                        <!-- Is disabled -->
                      <template v-slot:item.is_disabled="{ item }">
                        <span>
                          {{item.is_disabled == 1 ?  $t('message.YES') : $t('message.NO')}}
                        </span>
                      </template>
                      
                      <!-- Actions -->
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewProduct(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editProduct(item)"
                          v-if="(is('Super Admin') || can('edit_product'))"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteProduct(item.id)"
                          v-if="(is('Super Admin') || can('delete_product'))"
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
        <addEditProductModal></addEditProductModal>
        <viewProductModal :productData="productInfo"></viewProductModal>
        <importExcelFileModal ></importExcelFileModal>
      </div>
      <div class="unathorized-text" v-else>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 unauthorized">
              <v-alert
                color="red lighten-2"
                dark
              >
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
import addEditProductModal from "./modals/addEditProductModal.vue";
import viewProductModal from "./modals/viewProductModal.vue";
import importExcelFileModal from "./modals/importExcelFileModal.vue";
export default {
  data() {
    return {
      form: new form(),
      products: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      productInfo: {},
      countProduct: 0,
      productsLimit: 0,
      headers: [
        { text: this.$t("message.CODE"), value: "code" },
        { text: this.$t("message.NAME"), value: "title" },
        { text: this.$t("message.PRODUCT_CATEGORY"), value: "product_category.name" },
        { text: this.$t("message.BRAND"), value: "brand.name" },
        { text: this.$t("message.IS_DISABLED"), value: "is_disabled" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditProductModal,
    viewProductModal,
    importExcelFileModal
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
      if (this.is('Super Admin') || this.can('products')) {
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
            "api/products?page=" +
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
            this.products = response.data;
            this.$Progress.finish();
            this.loading = false;
          })
          .catch(() => {
            this.$Progress.fail();
            this.loading = false;
            toast.fire({
              icon: "error",
              title: this.$t("message.SOMETHING_WENT_WRONG")
            });
          });
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },
    deleteProduct(id) {
      if (this.is('Super Admin') || this.can('delete_product')) {
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
                .delete("api/products/" + id)
                .then(() => {
                  this.products.total -= 1;
                  Fire.$emit("reloadProducts");
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
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    addProduct() {
      if (this.is('Super Admin') || this.can('create_product')) {
        $("#addEditProductModal").modal("show");
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    editProduct(product) {
      if (this.is('Super Admin') || this.can('edit_product')) {
        this.productInfo = product;
        $("#addEditProductModal").modal("show", product);
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    viewProduct(product) {
      this.productInfo = product;
      $("#viewProductModal").modal("show", product);
    },
    importExcelFile(){
      $("#importExcelFileModal").modal("show");
    }
  },
  created() {
    Fire.$on("reloadProducts", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>