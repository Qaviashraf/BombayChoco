<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditOrderStatusModal"
      unit="dialog"
      aria-labelledby="addEditOrderStatusModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditOrderStatusModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_ORDER_STATUS") }}
            </h5>
            <h5 class="modal-title" id="addEditOrderStatusModalLabel" v-else>
              {{ $t("message.EDIT_ORDER_STATUS") }}
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
          <form @submit.prevent="editMode ? editOrderStatus() : addOrderStatus()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">

              <!-- Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.name"
                  v-bind:placeholder="$t('message.NAME')"
                  type="text"
                  name="name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <!-- Status Type -->
              <div class="form-group">
                <label
                  >{{ $t("message.STATUS_TYPE")
                  }}<span class="required-star">*</span></label
                >
                <v-select
                  v-model="form.status_type"
                  :options="types"
                  label="name"
                  :reduce="(type) => type.id"
                  :selectOnTab="true"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('status_type')"
                  v-html="form.errors.get('status_type')"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addOrderStatus"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_ORDER_STATUS") }}
              </button>
              <button
                @click.prevent="editOrderStatus"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_ORDER_STATUS") }}
              </button>

              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "addEditOrderStatusModal",
  props: ["orderStatusData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      types: [
        { "id": "1", "name": this.$t('message.IN_PROGRESS') },
        { "id": "0", "name": this.$t('message.CLOSED') },
      ],
      orderStatus: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        status_type:"",
      }),
    };
  },
  methods: {
    addOrderStatus() {
      if (this.is("Super Admin") || (this.can("create_order_status"))) {
        this.$Progress.start();
        this.form
          .post("api/orderStatus")
          .then(() => {
            Fire.$emit("reloadOrderStatus");
            $("#addEditOrderStatusModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              icon: "warning",
              title: this.$t("message.CREATED_MESSAGE_ERROR"),
            });
          });
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editOrderStatus() {
      if (this.is("Super Admin") || (this.can("edit_order_status"))) {
        this.$Progress.start();
        this.form
          .put("api/orderStatus/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadOrderStatus");
            $("#addEditOrderStatusModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              icon: "warning",
              title: this.$t("message.EDIT_MESSAGE_ERROR"),
            });
          });
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditOrderStatusModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
      } else {
        form.reset();
        that.editMode = false;
      }
    });
  },
};
</script>