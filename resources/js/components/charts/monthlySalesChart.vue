<template>
  <!-- <v-app> -->
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title">{{ $t("message.SALES") }}</h3>
          <a href="#">{{ $t("message.VIEW_REPORT") }}</a>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">
              50000
            </span>
            <span>{{ $t("message.SALES_OVER_TIME") }}</span>
          </p>
          <p
            class="ml-auto d-flex flex-column text-right"
            id="chart-top-left-content"
          >
            <!-- <span
              class="text-success"
              v-if="monthlySalesChart.monthlyGrowth > 0"
            >
              <i class="fas fa-arrow-up"></i>
              {{ parseFloat(monthlySalesChart.monthlyGrowth).toFixed(2) }}
            </span>
            <span class="text-danger" v-else>
              <i class="fas fa-arrow-down"></i>
              {{ parseFloat(monthlySalesChart.monthlyGrowth).toFixed(2) }}
            </span> -->
            <!-- <span class="text-muted">{{ $t("message.SINCE_LAST_MONTH") }}</span> -->
          </p>
        </div>
        <!-- /.d-flex -->

        3000
        <div class="position-relative mb-4">
          <canvas id="sales-chart" height="311"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end" id="content-start">
          <span class="mr-2">
            <i class="fas fa-square text-primary"></i>
            {{ $t("message.THIS_YEAR") }}
          </span>

          <span>
            <i class="fas fa-square text-gray"></i>
            {{ $t("message.LAST_YEAR") }}
          </span>
        </div>
      </div>
    </div>
  <!-- </v-app> -->
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      name: "Asad",
      monthlySalesChart: [],
    };
  },
  components: {},
  methods: {
    // // Setup the graph
    // loadGraph() {
    //   var that = this;
    //   let currentYearSales = this.monthlySalesChart.currentYearSales;
    //   let lastYearSales = this.monthlySalesChart.lastYearSales;
    //   // let January = t
    //   $(function() {
    //     "use strict";

    //     var ticksStyle = {
    //       fontColor: "#495057",
    //       fontStyle: "bold",
    //     };
    //     var mode = "index";
    //     var intersect = true;

    //     var $salesChart = $("#sales-chart");
    //     // eslint-disable-next-line no-unused-vars
    //     var salesChart = new Chart($salesChart, {
    //       type: "bar",
    //       data: {
    //         labels: [
    //           that.$t("message.JAN"),
    //           that.$t("message.FEB"),
    //           that.$t("message.MAR"),
    //           that.$t("message.APR"),
    //           that.$t("message.MAY"),
    //           that.$t("message.JUN"),
    //           that.$t("message.JULY"),
    //           that.$t("message.AUG"),
    //           that.$t("message.SEP"),
    //           that.$t("message.OCT"),
    //           that.$t("message.NOV"),
    //           that.$t("message.DEC"),
    //         ],
    //         datasets: [
    //           {
    //             backgroundColor: "#007bff",
    //             borderColor: "#007bff",
    //             data: currentYearSales,
    //           },
    //           {
    //             backgroundColor: "#ced4da",
    //             borderColor: "#ced4da",
    //             data: lastYearSales,
    //           },
    //         ],
    //       },
    //       options: {
    //         maintainAspectRatio: false,
    //         tooltips: {
    //           mode: mode,
    //           intersect: intersect,
    //           backgroundColor: "#FFF",
    //           titleFontSize: 16,
    //           titleFontColor: "#0066ff",
    //           bodyFontColor: "#000",
    //           bodyFontSize: 14,
    //           displayColors: false,
    //         },
    //         hover: {
    //           mode: mode,
    //           intersect: intersect,
    //         },
    //         legend: {
    //           display: false,
    //         },
    //         scales: {
    //           yAxes: [
    //             {
    //               // display: false,
    //               gridLines: {
    //                 display: true,
    //                 lineWidth: "4px",
    //                 color: "rgba(0, 0, 0, .2)",
    //                 zeroLineColor: "transparent",
    //               },
    //               ticks: $.extend(
    //                 {
    //                   beginAtZero: true,
    //                   callback: function(value) {
    //                     if (value >= 1000000) {
    //                       value /= 1000000;
    //                       value += "M";
    //                       return value;
    //                     }
    //                     else if (Math.floor(value) === value) {
    //                       return value;
    //                     }
    //                   },
    //                 },
    //                 ticksStyle
    //               ),
    //             },
    //           ],
    //           xAxes: [
    //             {
    //               display: true,
    //               gridLines: {
    //                 display: false,
    //               },
    //               ticks: ticksStyle,
    //             },
    //           ],
    //         },
    //       },
    //     });
    //   });
    // },

    // // Load the Graph Data
    // fetchData() {
    //   axios
    //     .get("api/monthlySalesChart")
    //     .then((response) => {
    //       this.monthlySalesChart = response.data;
    //       this.loadGraph();
    //     })
    //     .catch();
    // },
  },
  mounted() {
    // this.fetchData();
  },
};
</script>
