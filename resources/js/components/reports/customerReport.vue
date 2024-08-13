<template>
  <v-app>
    <div class="content-wrapper">
      <div
        v-if="
          is('Super Admin') || can('customer_report' )
        "
      >
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">
                  {{ $t("message.CUSTOMER_REPORT") }}
                </h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button
                  class="btn btn-success float-right"
                  @click="printReport()"
                >
                  {{ $t("message.PRINT") }}
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
                  <div class="card-header">
                    <div class="card-tools">
                      <form @submit.prevent class="d-flex">
                        <div
                          class="
                            input-group input-group-sm
                            searchBox
                            input-group-2
                          "
                        >
                          <input
                            type="text"
                            name="search"
                            class="form-control float-right"
                            v-bind:placeholder="$t('message.SEARCH')"
                            v-model="search"
                          />
                          <div class="input-group-append"></div>
                        </div>
                        <div class="input-group-append">
                          <button
                            type="submit"
                            class="btn btn-default"
                            @click="getResults(1)"
                            style="top: -7px"
                          >
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" id="printMe">
                    <div class="onlyForPrint">
                      <printHeader></printHeader>
                      <div class="printHeading">
                        <h3>{{ $t("message.CUSTOMER_REPORT") }}</h3>
                      </div>
                    </div>
                    <v-data-table
                      :headers="headers"
                      :items="
                        customerDetails.data
                          ? customerDetails.data
                          : customerDetails
                      "
                      :server-items-length="customerDetails.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <!-- No -->
                      <template #item.no="{ index }">
                        {{ index+1 }}
                      </template>

                      <!-- Total Sales -->
                      <template #item.total_sales="{ item }">
                        <span v-if="item.total_sales">
                          {{ item.total_sales | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                        </span>
                        <span v-else>-</span>
                      </template>

                      <!-- Amount Paid -->
                      <template #item.total_paid_amount="{ item }">
                        <span v-if="item.total_paid_amount">
                          {{ item.total_paid_amount | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                        </span>
                        <span v-else>-</span>
                      </template>

                      <!-- Balance -->
                      <template #item.remaining_amount="{ item }">
                        <span v-if="item.remaining_amount">
                          {{ item.remaining_amount | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                        </span>
                        <span v-else>-</span>
                      </template>

                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          title="View Customer Details"
                          small
                          class="mr-2"
                          @click="viewCustomerReportModal(item)"
                          v-if="is('Super Admin') ||  can('customer_report')"
                        >
                          mdi-eye
                        </v-icon>
                      </template>
                      <template
                        slot="body.append"
                        v-if="customerDetails.length != 0"
                      >
                        <!-- tr for total -->
                        <tr>
                          <td colspan="2"><b>{{$t("message.TOTAL")}}</b></td>
                          <th>
                            {{ totalSales | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            }) }}
                          </th>
                          <th>
                            {{ paidAmount | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            }) }}
                          </th>
                          <th>
                            {{ totalPayableAll | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            }) }}
                          </th>
                          <th></th>
                        </tr>
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
      </div>
      <div class="unathorized-text" v-else>
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

      <viewCustomerReportModal
        :customerReportData="customerInfo"
      ></viewCustomerReportModal>
    </div>
  </v-app>
</template>

<script>
import printHeader from "../includes/printHeader.vue";
import viewCustomerReportModal from "../modals/viewCustomerReportModal.vue";
import Vue from "vue";
window.Vue = Vue;
import moment from "moment";
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      form: new form(),
      id: "",
      customerDetails: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      customerInfo: "",
      headers: [
        { text: this.$t("message.S_NO"), value: "no" },
        { text: this.$t("message.CUSTOMER"), value: "name" },
        { text: this.$t("message.TOTAL_SALES"), value: "total_sales" },
        { text: this.$t("message.AMOUNT_PAID"), value: "total_paid_amount" },
        { text: this.$t("message.REMAINING_BALANCE"), value: "remaining_amount"},
        { text: this.$t("message.ACTIONS"), value: "actions", sortable: false },
      ],
    };
  },
  components: {
    printHeader,
    viewCustomerReportModal,
  },
  computed: {
    totalSales() {
      if (this.customerDetails.length > 0) {
        return this.customerDetails.reduce((total, sale) => {
          let total_sale = 0;
          // check only if sale.total_sales has value start
          if (sale.total_sales) {
            total_sale = sale.total_sales;
          }
          // check only if sale.total_sales has value end
          return total + parseFloat(total_sale);
        }, 0);
      }
    },
    paidAmount() {
      if (this.customerDetails) {
        if (this.customerDetails.length > 0) {
          return this.customerDetails.reduce((sum, i) => {
            return sum + +i.total_paid_amount;
          }, 0);
        }
      }
    },
    totalPayableAll() {
      let sum = 0;
      if (this.customerDetails) {
        if (this.customerDetails.length > 0) {
          this.customerDetails.map((item) => {
            sum += parseFloat(
              parseFloat(item.remaining_amount ? item.remaining_amount : 0)
            );
          });
        }
      }

      return sum;
    },
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
      if (
        this.is("Super Admin") || this.can("customer_report") ) {
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
        this.moment_from_date = moment(this.from_date).format("YYYY-MM-DD");
        this.moment_to_date = moment(this.to_date).format("YYYY-MM-DD");
        axios
          .get(
            "api/customerReport?from_date=" +
              this.moment_from_date +
              "&to_date=" +
              this.moment_to_date +
              "&page=" +
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
            this.customerDetails = response.data;
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

    viewCustomerReportModal(customer) {
      this.customerInfo = customer;
      $("#viewCustomerReportModal").modal("show");
    },

    printReport() {
      this.$htmlToPaper("printMe");
    },
  },
  created() {
    this.getResults();
  },
};
</script>
