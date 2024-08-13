<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditPaymentMethodModal"
      paymentMethod="dialog"
      aria-labelledby="addEditPaymentMethodModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditPaymentMethodModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_PAYMENT_METHOD") }}
            </h5>
            <h5 class="modal-title" id="addEditPaymentMethodModalLabel" v-else>
              {{ $t("message.EDIT_PAYMENT_METHOD") }}
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
          <form
            @submit.prevent="
              editMode ? editPaymentMethod() : addPaymentMethod()
            "
          >
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
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
              <div class="form-group">
                <label
                  >{{ $t("message.DESCRIPTION")
                  }}<span class="required-star"></span
                ></label>
                <textarea
                  v-model="form.description"
                  v-bind:placeholder="$t('message.DESCRIPTION')"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                  name="description"
                  id=""
                  rows="3"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addPaymentMethod"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_PAYMENT_METHOD") }}
              </button>
              <button
                @click.prevent="editPaymentMethod"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_PAYMENT_METHOD") }}
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
  name: "addEditPaymentMethodModal",
  props: ["paymentMethoddata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      paymentMethods: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        description: "",
      }),
    };
  },
  methods: {
    addPaymentMethod() {
      if (this.is("Super Admin") || this.can("create_payment_method")) {
        this.$Progress.start();
        this.form
          .post("api/paymentMethods")
          .then(() => {
            Fire.$emit("reloadPaymentMethods");
            $("#addEditPaymentMethodModal").modal("hide");
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
    editPaymentMethod() {
      if (this.is("Super Admin") || this.can("edit_payment_method")) {
        this.$Progress.start();
        this.form
          .put("api/paymentMethods/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadPaymentMethods");
            $("#addEditPaymentMethodModal").modal("hide");
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
    $("#addEditPaymentMethodModal").on("show.bs.modal", function(e) {
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
