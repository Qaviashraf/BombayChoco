<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditBrandModal"
      role="dialog"
      aria-labelledby="addEditBrandModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditBrandModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_BRAND") }}
            </h5>
            <h5
              class="modal-title"
              id="addEditBrandModalLabel"
              v-else
            >
              {{ $t("message.EDIT_BRAND") }}
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
              editMode ? editBrand() : addBrand()
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
                    v-bind:src="'images/brands/' + form.image"
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
              <div class="form-group">
                <label>{{ $t("message.BANNER_IMAGE") }}</label>
                <span v-if="editMode && form.banner_image!=null"
                  ><img
                    v-bind:src="'images/brands/' + form.banner_image"
                    width="15%"
                    alt="Banner not found"
                /></span>

                <input
                  @change="addBannerImage"
                  type="file"
                  name="banner_image"
                  id="banner_image"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('banner_image') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('banner_image')"
                  v-html="form.errors.get('banner_image')"
                />
              </div>
              <!-- Description -->
              <div class="form-group">
                  <label>{{ $t("message.DESCRIPTION") }}<span class="required-star"></span></label>
                  <textarea
                    v-model="form.description"
                    v-bind:placeholder="$t('message.DESCRIPTION')"
                    type="text"
                    name="description"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('description') }"
                  ></textarea>
                  <div
                    class="error-message"
                    v-if="form.errors.has('description')"
                    v-html="form.errors.get('description')"
                  />
              </div>
              <!-- End -->
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addBrand"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_BRAND") }}
              </button>
              <button
                @click.prevent="editBrand"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_BRAND") }}
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
  name: "addEditBrandModal",
  props: ["brandData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      brands: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        image: "",
        banner_image: "",
        description: "",
      }),
    };
  },
  methods: {
    addBrand() {
      if (this.is("Super Admin") || this.can("create_brand")) {
        this.$Progress.start();
        this.form
          .post("api/brands")
          .then(() => {
            Fire.$emit("reloadBrands");
            $("#addEditBrandModal").modal("hide");
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
    editBrand() {
      if (this.is("Super Admin") || this.can("edit_brand")) {
        this.$Progress.start();
        this.form
          .put("api/brands/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadBrands");
            $("#addEditBrandModal").modal("hide");
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
    addBannerImage(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.banner_image = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditBrandModal").on("show.bs.modal", function(e) {
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
