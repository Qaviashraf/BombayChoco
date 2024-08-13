<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditProductFlavourModal"
      role="dialog"
      aria-labelledby="addEditProductFlavourModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditProductFlavourModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_PRODUCT_FLAVOUR") }}
            </h5>
            <h5
              class="modal-title"
              id="addEditProductFlavourModalLabel"
              v-else
            >
              {{ $t("message.EDIT_PRODUCT_FLAVOUR") }}
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
              editMode ? editProductFlavour() : addProductFlavour()
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
                <label>{{ $t("message.IMAGE") }}*</label>
                <span v-if="editMode && form.image!=null"
                  ><img
                    v-bind:src="'images/product-flavours/' + form.image"
                    width="15%"
                    alt="Banner not found"
                /></span>

                <input
                  @change="addPhoto"
                  type="file"
                  name="image"
                  id="image"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('image') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('image')"
                  v-html="form.errors.get('image')"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addProductFlavour"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_PRODUCT_FLAVOUR") }}
              </button>
              <button
                @click.prevent="editProductFlavour"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_PRODUCT_FLAVOUR") }}
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
import Vue from 'vue';
export default {
  name: "addEditProductFlavourModal",
  props: ["productFlavourdata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      productFlavours: [],
      parentFlavours: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        image: "",
      }),
    };
  },
  methods: {
    addProductFlavour() {
      if (this.is("Super Admin") || this.can("create_product_flavour")) {
        this.$Progress.start();
        this.form
          .post("api/productFlavours")
          .then(() => {
            Fire.$emit("reloadProductFlavours");
            $("#addEditProductFlavourModal").modal("hide");
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
    editProductFlavour() {
      if (this.is("Super Admin") || this.can("edit_product_flavour")) {
        this.$Progress.start();
        this.form
          .put("api/productFlavours/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadProductFlavours");
            $("#addEditProductFlavourModal").modal("hide");
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
          image: "warning",
        });
      }
    },
    addPhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditProductFlavourModal").on("show.bs.modal", function(e) {
      // Reset the Image Field
      document.getElementById("image").value = "";
      Vue.nextTick().then(function () {
        if (e.relatedTarget) {
          that.editMode = true;
          form.fill(e.relatedTarget);
        } else {
          form.reset();
          that.editMode = false;
        }
      });
    });
  },
};
</script>
