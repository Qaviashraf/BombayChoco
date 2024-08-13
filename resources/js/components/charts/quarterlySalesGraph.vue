<template>
  <!-- <v-app> -->
    <!-- solid sales graph -->
    <div class="card bg-info-gradient">
      <div class="card-header no-border">
        <h3 class="card-title">
          <i class="fa fa-th mr-1"></i>
          {{$t('message.SALE_GRAPH')}}
        </h3>
        <!-- <div class="card-tools">
          <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn bg-info btn-sm" data-widget="remove">
            <i class="fa fa-times"></i>
          </button>
        </div> -->
      </div>
      <div class="card-body">
        <canvas class="chart" id="line-chart" style="min-height: 255px; height: 305px; max-height: 305px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
      <!-- <div class="card-footer bg-transparent">
        <div class="row">
        <div class="col-4 text-center">
        <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
        <div class="text-green">Mail-Orders</div>
        </div>
        
        <div class="col-4 text-center">
        <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
        <div class="text-green">Online</div>
        </div>
        
        <div class="col-4 text-center">
        <div style="display:inline;width:60px;height:60px;">
          <canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
        </div>
        <div class="text-green">In-Store</div>
        </div>
        
        </div>
        
        </div> -->
      <!-- /.card-footer -->
    </div>
  <!-- /.card -->
  <!-- </v-app> -->
</template>
<script>
import Chart from 'chart.js' 
import axios from "axios";
export default {
  data() {
    return {
      name: "Asad",
      quarterlySaleGraph:[],
    };
  },
  components: {},
  methods: {
    loadGraph(){
      var that = this;
      let labels = this.quarterlySaleGraph.labels;
      let data = this.quarterlySaleGraph.data;
      $(function() {
            // Sales graph chart
            var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
            // $('#revenue-chart').get(0).getContext('2d');

            var salesGraphChartData = {
              labels: labels,
              datasets: [
                {
                  label: that.$t('message.SALES'),
                  fill: false,
                  borderWidth: 2,
                  lineTension: 0,
                  spanGaps: true,
                  borderColor: '#891221',
                  pointRadius: 3,
                  pointHoverRadius: 7,
                  pointColor: '#891221',
                  pointBackgroundColor: '#891221',
                  data: data,
                }
              ]
            }

          var salesGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                ticks: {
                  fontColor: '#00117E'
                },
                gridLines: {
                  display: false,
                  color: '#00117E',
                  drawBorder: false
                }
              }],
              yAxes: [{
                ticks: {
                  stepSize: 5000,
                  fontColor: '#00117E'
                },
                gridLines: {
                  display: true,
                  color: '#00117E',
                  drawBorder: false
                }
              }]
            }
          }
          // This will get the first returned node in the jQuery collection.
          // eslint-disable-next-line no-unused-vars
          var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
            type: 'line',
            data: salesGraphChartData,
            options: salesGraphChartOptions
          })
      })
    },
    // Load the Graph Data
    fetchData() {
      axios
        .get("api/quarterlySaleGraph")
        .then((response) => {
          this.quarterlySaleGraph = response.data;
          // console.log(this.quarterlySaleGraph.labels);
          this.loadGraph();
        })
        .catch();
    },
  },
  mounted() {
    this.fetchData();
  },
};
</script>