<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderStatusModal"
      role="dialog"
      aria-labelledby="viewOrderStatus"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderStatusModal">
              {{ $t("message.VIEW_ORDER_STATUS") }}:
              {{ orderStatusData.name }}
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
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
                  {{ $t("message.VIEW_ORDER_STATUS") }}:
                  {{ orderStatusData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td>{{orderStatusData.name}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.STATUS_TYPE") }}</th>
                        <td v-if="orderStatusData.status_type == 0">{{this.$t('message.CLOSED')}}</td>
                        <td v-else>{{this.$t('message.IN_PROGRESS')}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CREATED_BY") }}</th>
                        <td v-if="orderStatusData.created_by">{{orderStatusData.created_by.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr v-if="orderStatusData.updated_by">
                        <th>{{ $t("message.UPDATED_BY") }}</th>
                        <td>{{orderStatusData.updated_by.name}}</td>
                    </tr>
                     <tr>
                        <th>{{ $t("message.CREATED_AT") }}</th>
                        <td v-if="orderStatusData.created_at">{{orderStatusData.created_at | formatDateTime}}</td>
                        <td v-else>-</td>
                    </tr>
                     <tr>
                        <th>{{ $t("message.UPDATED_AT") }}</th>
                        <td v-if="orderStatusData.updated_at">{{orderStatusData.updated_at | formatDateTime}}</td>
                        <td v-else>-</td>
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
  name: "viewOrderStatusModal",
  props: ["orderStatusData"],
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