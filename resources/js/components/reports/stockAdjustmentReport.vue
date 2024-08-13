<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('stock_adjustment_report')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.STOCK_ADJUSTMENT_REPORT") }}</h1>
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <h3 class="card-title">
                      <b>{{ $t("message.STOCK_ADJUSTMENT_REPORT") }}</b>
                    </h3> -->
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
                        <h3>{{ $t("message.STOCK_ADJUSTMENT_REPORT") }}</h3>
                      </div>
                      <div class="printDate">{{ tDateTime }}</div>
                    </div>

                    <v-data-table
                      :headers="headers"
                      :items="stockAdjustmentReports"
                      :server-items-length="stockAdjustmentReports.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <!-- Date -->
                      <template #item.date="{ item, index }">
                        <span v-if="item.date">
                          {{ item.date | formatDate }}
                        </span>
                        <span v-else>-</span>
                      </template>
                      <!-- End -->

                      <!-- Number -->
                      <template #item.number="{ item, index }">
                         {{index +1 }}
                      </template>
                      <!-- End -->

                      <!-- Stock Adjustment Quantity -->
                      <template #item.stock_adjustments="{ item, index }">
                        <span v-if="item.stock_adjustments">
                          {{ item.stock_adjustments }}
                        </span>
                        <span v-else>-</span>
                      </template>
                      <!-- End -->
                      
                      <!-- View Modal -->
                      <template  v-slot:item.actions="{ item }">
                        <v-icon
                        color="green"
                        title="View Stock Adjustment Detail"
                        small
                        class="mr-2 align-center iconColor"
                        @click="
                          viewStockAdjustmentReportModal(item.date)
                        "
                      >
                        mdi-eye
                      </v-icon>
                      </template>
                      <!-- End -->
                      
                      <!-- Total -->
                      <template
                        slot="body.append"
                        v-if="stockAdjustmentReports.length != 0"
                      >
                        <!-- tr for total -->
                        <tr>
                          <td colspan="2"><b>{{$t("message.TOTAL")}}</b></td>
                          <th><b>{{ stock_adjustment_total }}</b></th>
                          <th class="notForPrint" colspan="3"></th>
                        </tr>
                      </template>
                      <!-- End -->
                    </v-data-table>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.content -->
       <viewStockAdjustmentReportModal
        :viewStockAdjustmentReportData="stockAdjustmentDate"
      ></viewStockAdjustmentReportModal>
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
import Vue from "vue";
window.Vue = Vue;
import moment from "moment";
import printHeader from "../includes/printHeader.vue";
import viewStockAdjustmentReportModal from "../modals/viewStockAdjustmentReportModal.vue";
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      stockAdjustmentReports: [],
      curpage: 1,
      searchText: "",
      stockReportsPerPage: 10000,
      searchFlag: false,
      tDateTime: todayDateTime,
      stockAdjustmentReport: {},
      stockId: "",
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
      stockAdjustmentDate: "",
      id: "",
      headers: [
        { text: this.$t("message.S_NO"), value: "number" },
        { text: this.$t("message.DATE"), value: "date" },
        { text: this.$t("message.COUNT"), value: "stock_adjustments" },
        { text: this.$t("message.ACTIONS"), value: "actions", sortable: false },
      ],
    };
  },
 components: {
    printHeader,
    viewStockAdjustmentReportModal,
  },
  
  computed: {
    stock_adjustment_total() {
      if (this.stockAdjustmentReports) {
        if (this.stockAdjustmentReports.length > 0) {
          return this.stockAdjustmentReports.reduce((sum, i) => {
            return sum + +i.stock_adjustments;
          }, 0);
        }
      }
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
    viewStockAdjustmentReportModal(date) {
      this.stockAdjustmentDate = date;
      $("#viewStockAdjustmentReportModal").modal("show");
    },
    
    getResults(page = 1, rows = 10, sortBy = null, sortDesc = null) {
      if (this.is("Super Admin") || this.can("stock_adjustment_report")) {
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
            "api/stockAdjustmentReport?from_date=" +
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
            this.stockAdjustmentReports = response.data;
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
    Fire.$on("reloadStocks", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>
