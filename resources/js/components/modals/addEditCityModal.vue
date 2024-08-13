<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditCityModal"
      city="dialog"
      aria-labelledby="addEditCityModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditCityModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_CITY") }}
            </h5>
            <h5 class="modal-title" id="addEditCityModalLabel" v-else>
              {{ $t("message.EDIT_CITY") }}
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
          <form @submit.prevent="editMode ? editCity() : addCity()">
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
                  >{{ $t("message.DELIVERY_CHARGES")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.delivery_price"
                  v-bind:placeholder="$t('message.DELIVERY_CHARGES')"
                  type="number"
                  name="delivery_price"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('delivery_price') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('delivery_price')"
                  v-html="form.errors.get('delivery_price')"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addCity"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_CITY") }}
              </button>
              <button
                @click.prevent="editCity"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_CITY") }}
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
  name: "addEditCityModal",
  props: ["citydata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      cities: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        delivery_price: "",
      }),
    };
  },
  methods: {
    addCity() {
      if (this.is("Super Admin") || this.can("create_city")) {
        this.$Progress.start();
        this.form
          .post("api/cities")
          .then(() => {
            Fire.$emit("reloadCities");
            $("#addEditCityModal").modal("hide");
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
    editCity() {
      if (this.is("Super Admin") || this.can("edit_city")) {
        this.$Progress.start();
        this.form
          .put("api/cities/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadCities");
            $("#addEditCityModal").modal("hide");
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
    $("#addEditCityModal").on("show.bs.modal", function(e) {
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
