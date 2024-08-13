<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderModal"
      role="dialog"
      aria-labelledby="viewOrder"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderModal">
              {{ $t("message.VIEW_ORDER") }}:
              {{ orderData.reference }}
            </h5>
            <button
              type="button"
              class="close"
              onclick="$('#viewOrderModal').modal('hide');"
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
                  {{ $t("message.VIEW_ORDER") }}:
                  {{ orderData.reference }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td v-if="orderData.order_date">
                      {{ orderData.order_date | formatDate }}
                    </td>
                    <td v-else>--</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ORDER_NUMBER") }}</th>
                    <td>
                      {{
                        orderData.reference ? orderData.reference : "-"
                      }}
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.BILL_NUMBER") }}</th>
                    <td>{{ orderData.bill_no ? orderData.bill_no : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ORDER_STATUS") }}</th>
                    <td v-if="orderData.order_status">
                      <span
                        class="badge badge-primary"
                        v-if="orderData.order_status.id == 1"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-warning"
                        v-else-if="orderData.order_status.id == 2"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-info"
                        v-else-if="orderData.order_status.id == 3"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-success"
                        v-else-if="orderData.order_status.id == 4"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-danger"
                        v-else-if="orderData.order_status.id == 5"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span class="badge badge-secondary" v-else>
                        {{ orderData.order_status.name }}
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <!-- <tr>
                    <th>{{$t('message.PAYMENT_STATUS')}}</th>
                    <td>
                      <span
                        v-if="orderData.payment_status == 'paid'"
                        class="badge badge-success"
                        >{{ $t("message.PAID") }}</span
                      >
                      <span
                        v-else-if="orderData.payment_status == 'unpaid'"
                        class="badge badge-danger"
                        >{{ $t("message.UNPAID") }}</span
                      >
                      <span v-else class="badge badge-warning">{{
                        $t("message.PARTIAL_PAYMENT")
                      }}</span>
                    </td>
                  </tr> -->
                  <tr>
                    <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                    <td v-if="orderData.payment_method">
                      {{ orderData.payment_method.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CUSTOMER") }}</th>
                    <td v-if="orderData.customer">
                      {{ orderData.customer.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.EMAIL") }}</th>
                    <td v-if="orderData.customer">
                      {{ orderData.customer.email }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PHONE") }}</th>
                    <td v-if="orderData.customer">
                      {{ orderData.customer.phone }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ADDRESS") }}</th>
                    <td v-if="orderData.customer">
                      {{ orderData.customer.address }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td v-if="orderData.notes">{{ orderData.notes }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="orderData.created_by">
                      {{ orderData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="orderData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ orderData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="orderData.created_at">
                      {{ orderData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="orderData.updated_at">
                      {{ orderData.updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <h2>{{ $t("message.ORDER_DETAILS") }}</h2>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>
                    <label>{{ $t("message.PRODUCT") }}</label>
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
                  <th>
                    <label>{{ $t("message.SUB_TOTAL") }}</label>
                  </th>
                </tr>
                <tbody>
                  <tr
                    v-for="(data, index) in orderData.order_details"
                    :key="index"
                  >
                    <td v-if="data && data.product">
                      {{ data.product.title }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.quantity">
                      {{ data.quantity }}
                    </td>
                    <td v-if="data.sale_price">
                      {{
                        data.sale_price
                          
                      }}
                    </td>
                    <td v-else>0</td>
                    <td v-if="data.weight">
                      {{
                        data.weight
                          
                      }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.sub_total">
                      {{
                        data.sub_total
                      }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <!-- Change Approval Status Work -->
              <div
                class="row notForPrint"
                v-if="
                  orderData &&
                    orderData.order_status &&
                    orderData.order_status.status_type == 1
                "
              >
                <div class="col-md-12">
                  <button
                    @click.prevent="changeStatus"
                    class="btn btn-success btn-sm mb-2"
                    v-if="is('Super Admin') || can('orders')"
                  >
                    {{ $t("message.CHANGE_STATUS") }}
                  </button>
                  <div v-if="isChange" class="my-3">
                    <form @submit.prevent="updateStatus()">
                      <input type="hidden" name="_token" :value="csrf" />
                      <!-- Order Status -->
                      <div class="form-group">
                        <label
                          >{{ $t("message.ORDER_STATUS")
                          }}<span class="required-star"> *</span></label
                        >
                        <v-select
                          v-model="form.order_status_id"
                          :options="orderStatuses"
                          label="name"
                          :reduce="(orderStatus) => orderStatus.id"
                          :selectOnTab="true"
                          :class="{
                            'is-invalid': form.errors.has('order_status_id'),
                          }"
                        />
                        <div
                          class="error-message"
                          v-if="form.errors.has('order_status_id')"
                          v-html="form.errors.get('order_status_id')"
                        />
                      </div>
                      <!-- End -->
                      <div class="text-center">
                        <button
                          @click.prevent="updateStatus"
                          type="submit"
                          :disabled="form.order_status_id == ''"
                          class="btn btn-primary "
                        >
                          {{ $t("message.UPDATE") }}
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End of Change Approval Status Work -->
              <!-- Amount Summary -->
              <span v-if="orderData.sub_total != 0"
                ><h5 class="text-center mt-3">
                  <b
                    >{{ $t("message.SUB_TOTAL") }}:
                    <span class="adminOrderTotal">{{ orderData.sub_total }}</span></b
                  >
                </h5></span
              >
              <!-- Amount Summary End -->
            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                onclick="$('#viewOrderModal').modal('hide');"
              >
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
import Vue from "vue";
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewOrderModal",
  props: ["orderData"],
  data() {
    return {
      isChange: false,
      orderInfo: {},
      orderStatuses: [],
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      form: new form({
        order_status_id: "",
      }),
    };
  },
  components: {
    printHeader,
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printData");
    },
    // change status toggle function
    changeStatus() {
      this.isChange = !this.isChange;
    },
    // update the order status
    updateStatus() {
      if (this.is("Super Admin") || this.can("orders")) {
        this.$Progress.start();
        swal
          .fire({
            text: this.$t(
              "message.ARE_YOU_SURE_YOU_WANT_TO_UPDATE_THIS_ORDER_STATUS"
            ),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: this.$t("message.UPDATED"),
          })
          .then((result) => {
            if (result.value) {
              // Send request to the server
              this.form
                .post("api/updateOrderStatus/" + this.orderData.id)
                .then(() => {
                  Fire.$emit("reloadOrders");
                  $("#viewOrderModal").modal("hide");
                  swal.fire(
                    this.$t("message.UPDATED"),
                    this.$t("message.ORDER_STATUS_UPDATED_SUCCESSFULLY"),
                    "success"
                  );
                  this.form.reset();
                  this.isChange = !this.isChange;
                  this.$Progress.finish();
                })
                .catch(() => {
                  swal.fire(
                    this.$t("Failed!"),
                    this.$t("message.deletedMessageError"),
                    "warning"
                  );
                  $("#viewOrderModal").modal("hide");
                });
            }
          });
      } else {
        swal.fire({
          text: this.$t("message.unAuthorizedText"),
          type: "warning",
        });
      }
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#viewOrderModal").on("show.bs.modal", function(e) {
      that.form.reset();
      that.isChange = false;
      Vue.nextTick().then(function() {
        axios
          .get(
            "api/getAllOrderStatus?order_status_id=" +
              that.orderData.order_status_id
          )
          .then((response) => {
            that.orderStatuses = response.data;
          });
      });
    }); 
  },
};
</script>
