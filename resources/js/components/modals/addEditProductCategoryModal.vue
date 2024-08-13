<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditProductCategoryModal"
      role="dialog"
      aria-labelledby="addEditProductCategoryModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditProductCategoryModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_PRODUCT_CATEGORY") }}
            </h5>
            <h5
              class="modal-title"
              id="addEditProductCategoryModalLabel"
              v-else
            >
              {{ $t("message.EDIT_PRODUCT_CATEGORY") }}
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
              editMode ? editProductCategory() : addProductCategory()
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
                <label>{{ $t("message.PARENT_CATEGORY") }}</label>
                <v-select
                  v-model="form.parent_id"
                  :options="parentCategories"
                  label="name"
                  :reduce="(parentCategory) => parentCategory.id"
                  :selectOnTab="true"
                  :key="form.parent_id"
                  :class="{
                    'is-invalid': form.errors.has('parent_id'),
                  }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('parent_id')"
                  v-html="form.errors.get('parent_id')"
                />
              </div>
              <div class="form-group">
                <label>{{ $t("message.IMAGE") }}*</label>
                <span v-if="editMode && form.image!=null"
                  ><img
                    v-bind:src="'images/product-categories/' + form.image"
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
                    v-bind:src="'images/product-categories/' + form.banner_image"
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
              <div class="form-group">
                <label>Color Code</label>
                <v-color-picker v-model="form.color_code"></v-color-picker>
              </div>
              <!-- Description -->
              <div class="form-group">
                  <label>{{ $t("message.DESCRIPTION") }}<span class="required-star"></span></label>
                  <vue-editor v-model="form.description"></vue-editor>
                  <div
                    class="error-message"
                    v-if="form.errors.has('description')"
                    v-html="form.errors.get('description')"
                  />
              </div>
              <div>
                  <h2 class="text-center">SEO Section</h2>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Slug<span class="required-star">*</span></label >
                          <input
                            v-model="form.slug"
                            v-bind:placeholder="'Slug'"
                            type="text"
                            name="slug"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('slug') }"
                          />
                          <div
                            class="error-message"
                            v-if="form.errors.has('slug')"
                            v-html="form.errors.get('slug')"
                          />
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Meta Title</label>
                          <input
                            v-model="form.meta_title"
                            v-bind:placeholder="'Meta Title'"
                            type="text"
                            name="meta_title"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('meta_title') }"
                          />
                          <div
                            class="error-message"
                            v-if="form.errors.has('meta_title')"
                            v-html="form.errors.get('meta_title')"
                          />
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Meta Description</label>
                          <textarea
                            v-model="form.meta_description"
                            v-bind:placeholder="'Meta Description'"
                            type="text"
                            name="meta_description"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('meta_description') }"
                          ></textarea>
                          <div
                            class="error-message"
                            v-if="form.errors.has('meta_description')"
                            v-html="form.errors.get('meta_description')"
                          />
                        </div>
                    </div>
                  </div>
              </div>
              <!-- End -->
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addProductCategory"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_PRODUCT_CATEGORY") }}
              </button>
              <button
                @click.prevent="editProductCategory"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_PRODUCT_CATEGORY") }}
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
import { VueEditor } from "vue2-editor";
export default {
  name: "addEditProductCategoryModal",
  props: ["productCategorydata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      productCategories: [],
      parentCategories: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        color_code:"",
        slug: "",
        meta_title: "",
        meta_description: "",
        parent_id:"",
        image: "",
        banner_image: "",
        description: "",
      }),
    };
  },
  components: {
    Vue,
    VueEditor
  },
  methods: {
    addProductCategory() {
      if (this.is("Super Admin") || this.can("create_product_category")) {
        this.$Progress.start();
        this.form
          .post("api/productCategories")
          .then(() => {
            Fire.$emit("reloadProductCategories");
            $("#addEditProductCategoryModal").modal("hide");
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
    editProductCategory() {
      if (this.is("Super Admin") || this.can("edit_product_category")) {
        this.$Progress.start();
        this.form
          .put("api/productCategories/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadProductCategories");
            $("#addEditProductCategoryModal").modal("hide");
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
    $("#addEditProductCategoryModal").on("show.bs.modal", function(e) {
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
        axios
          .get("api/getAllParentCategories")
          .then((response) => {
          that.parentCategories = response.data;
          }).catch(() => {
            that.$Progress.fail();
            toast.fire({
              icon: "error",
              title: that.$t("message.SOMETHING_WENT_WRONG"),
            });
          });
      });
    });
  },
};
</script>
