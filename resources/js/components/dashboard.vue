<template>
  <v-app>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $t('message.DASHBOARD') }}</h1>
            </div>
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
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">{{$t('message.LATEST_ORDERS')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-responsive table-hover table-bordered collapse-in" id="demo">
                  <table class="table m-0" >
                    <thead>
                    <tr>
                      <th>{{$t('message.ORDER_NUMBER')}}</th>
                      <th>{{$t('message.CUSTOMER')}}</th>
                      <th>{{$t('message.SUB_TOTAL')}}</th>
                      <th>{{$t('message.STATUS')}}</th>
                    </tr>
                    </thead>
                    <tbody v-if="getLatestOrders !=''">
                      <tr v-for="(data,index) in getLatestOrders" :key="index" >
                        <td><a href="/orders">{{data.reference}}</a></td>
                        <td v-if="data.customer">{{data.customer.name}}</td>
                        <td v-if="data.sub_total">{{data.sub_total }}</td>
                        <td v-else>0 </td>
                        <td v-if="data.order_status">
                          <span class="badge badge-primary" v-if="data.order_status.id == 1">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-warning" v-else-if="data.order_status.id == 2">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-info" v-else-if="data.order_status.id == 3">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-success" v-else-if="data.order_status.id == 4">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-danger" v-else-if="data.order_status.id == 5">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-secondary" v-else>
                            {{data.order_status.name}}
                          </span>
                        </td>
                      </tr>
                      </tbody>
                      <thead v-else>
                        <tr>
                          <td colspan="4" align="center">{{$t('message.SORRY_NO_LATEST_ORDER_AVAILABLE')}}</td>
                        </tr>
                      </thead>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
            <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </v-app>
</template>

<script>
export default {
  data() {
        return {
          getLatestOrders:{},
        };
    },
    methods:{
      getData(){
        axios
          .get("api/getLatestOrders")
          .then((response) => { 
            this.getLatestOrders = response.data;
            this.$Progress.finish();
            }).catch(() => {
          this.$Progress.fail();
          this.loading = false;
        });
      }
    },
    mounted() {
       this.getData();
    },
};
</script>