<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('orders_report')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.ORDERS_REPORT") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="printReport()">
                  {{ $t("message.PRINT") }}
                  <i class="fas fa-plus fa-fw"></i>
                </button>
                <button class="btn btn-info mr-2 float-right" v-if="(from_date != '' || to_date != '')" @click="reset()" >
                  {{$t('message.RESET')}}
                  <i class="fas fa-sync-alt"></i>
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
                          class="input-group input-group-sm float-left mr-2 searchBox input-group-2"
                        >
                          <datetime
                            type="date"
                            name="from_date"
                            id="from_date"
                            class="form-control float-right datetime_input"
                            v-bind:placeholder="$t('message.FROM_DATE')"
                            v-model="from_date"
                          >
                          </datetime>
                        </div>
                        <div
                          class="input-group input-group-sm float-left mr-2 searchBox input-group-2"
                        >
                          <datetime
                            type="date"
                            id="to_date"
                            name="to_date"
                            class="form-control float-right datetime_input"
                            v-bind:placeholder="$t('message.TO_DATE')"
                            v-model="to_date"
                          >
                          </datetime>
                        </div>
                        <div class="input-group input-group-sm searchBox input-group-2">
                          <input
                            type="text"
                            name="search"
                            class="form-control float-right"
                            v-bind:placeholder="$t('message.SEARCH')"
                            v-model="search"
                          />
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
                        <h3>{{ $t("message.ORDERS_REPORT") }}</h3>
                      </div>
                      <div v-if="from_date != ''" class="printDateHeading">
                        {{ $t("message.FROM_DATE") }}: {{ from_date | formatDate }}
                      </div>
                      <div v-if="to_date != ''" class="printDateHeading">
                        {{ $t("message.TO_DATE") }}: {{ to_date | formatDate }}
                      </div>
                    </div>
                    <v-data-table
                      :headers="headers"
                      :items="sales.data ? sales.data : sales"
                      :server-items-length="sales.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <!-- Sale Date -->
                      <template #item.order_date="{ item }">
                        <span v-if="item.order_date">
                          {{ item.order_date | formatDate }}
                        </span>
                        <span v-else>-</span>
                      </template>

                      <!-- Total Amount -->
                      <template #item.grand_total="{ item }">
                        <span v-if="item.grand_total">
                          {{
                            item.grand_total
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                        <span v-else>
                          {{
                            0
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                      </template>

                      <!-- Total Amount Paid -->
                      <template #item.total_amount_paid="{ item }">
                        <span v-if="item.total_amount_paid">
                          {{
                            item.total_amount_paid
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                        <span v-else>
                          {{
                            0
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                      </template>

                      <!--Remaining Balance -->
                      <template #item.remaining_amount="{ item }">
                        <span v-if="item.remaining_amount">
                          {{
                            item.remaining_amount
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                        <span v-else>
                          {{
                            0
                            | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                          }}
                        </span>
                      </template>

                      <!-- Actions -->
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          title="View Sales"
                          small
                          class="mr-2"
                          @click="viewOrderReportModal(item)"
                        >
                          mdi-eye
                        </v-icon>

                      </template>
                      <template
                        slot="body.append"
                        v-if="sales.length != 0"
                      >
                        <!-- tr for total -->
                        <tr>
                          <td colspan="1"><b>{{$t("message.TOTAL")}}</b></td>
                          <th>
                            {{ totalAmount | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            }) }}
                          </th>
                          <th>
                            {{ totalPaidAmount | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            }) }}
                          </th>
                          <th>
                            {{ totalRemainingAmount | currency("Ar", 2, {
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
        <viewOrderReportModal :saleData="saleReportInfo"></viewOrderReportModal>
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
    </div>
  </v-app>
</template>

<script>
import printHeader from "../includes/printHeader.vue";
import viewOrderReportModal from "../modals/viewOrderReportModal.vue";
import Vue from "vue";
window.Vue = Vue;
import moment from "moment";
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      form: new form(),
      sales: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      from_date: "",
      moment_from_date: "",
      moment_to_date: "",
      to_date: "",
      id: "",
      fund_type_data: "",
      dailyQuotationReportInfo: {},
      outlets: [],
      outlet_id: "",
      saleReportInfo: {},
      headers: [
        { text: this.$t("message.DATE"), value: "order_date" },
        { text: this.$t("message.TOTAL_AMOUNT"), value: "grand_total" },
        { text: this.$t("message.AMOUNT_PAID"), value: "total_amount_paid" },
        { text: this.$t("message.REMAINING_BALANCE"), value: "remaining_amount" },
        { text: this.$t("message.ACTIONS"), value: "actions", sortable: false },
      ],
    };
  },
  components: {
    printHeader,
    viewOrderReportModal
  },
  computed: {
    totalAmount() {
      if (this.sales) {
        if (this.sales.length > 0) {
          return this.sales.reduce((sum, i) => {
            return sum + +i.grand_total;
          }, 0);
        }
      }
    },
    totalPaidAmount() {
      if (this.sales) {
        if (this.sales.length > 0) {
          return this.sales.reduce((sum, i) => {
            return sum + +i.total_amount_paid;
          }, 0);
        }
      }
    },
    totalRemainingAmount() {
      let sum = 0;
      if (this.sales) {
        if (this.sales.length > 0) {
          this.sales.map((item) => {
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
      if (this.is("Super Admin") || this.can("orders_report")) {
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
            "api/ordersReport?from_date=" +
              this.moment_from_date +
              "&to_date=" +
              this.moment_to_date +
              "&page=" +
              page +
              "&outlet_id=" +
              this.outlet_id +
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
            this.sales = response.data;
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

    printReport() {
      this.$htmlToPaper("printMe");
    },

    // View Sale Payment Modal
    viewOrderReportModal(sale)
    {
      this.saleReportInfo = sale;
      $("#viewOrderReportModal").modal("show", sale);
    },

    // Reset all the filters
    reset()
    {
      this.from_date = '';
      this.to_date = '';
      this.getResults();
    }
  },
  created() {
    this.getResults();
  },
};
</script>
