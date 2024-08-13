<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditHomeSliderModal"
      role="dialog"
      aria-labelledby="addEditHomeSliderModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditHomeSliderModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_HOME_SLIDER") }}
            </h5>
            <h5
              class="modal-title"
              id="addEditHomeSliderModalLabel"
              v-else
            >
              {{ $t("message.EDIT_HOME_SLIDER") }}
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
              editMode ? editHomeSlider() : addHomeSlider()
            "
          >
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <div class="form-group">
                <label
                  >{{ $t("message.TITLE")
                  }}<span class="required-star">*</span></label
                >
                <input
             l     v-model="form.title"
                  v-bind:placeholder="$t('message.TITLE')"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label>{{ $t("message.IMAGE") }}*</label>
                <span v-if="editMode && form.image!=null"
                  ><img
                    v-bind:src="'images/home-sliders/' + form.image"
                    width="15%"
                    alt="Banner not found"
                /></span>

                <input
                  @change="addPhoto"
                  type="file"
                  id="image"
                  name="image"
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
                <label
               >{{ $t("message.REDIRECT_TO") 
               }}<span class="required-star">*</span></label
             >
             <v-radio-group 
              v-model="form.redirect_to"
              row
              @change="reset()"
             >
              <v-radio :label="$t('message.PRODUCT')" value="Product"></v-radio>
              <v-radio :label="$t('message.CATEGORY')" value="Category"></v-radio>
              <v-radio :label="$t('message.CATEGORY_SCREEN')" value="Category Screen"></v-radio>
              <v-radio :label="$t('message.PROMOTION_SCREEN')" value="Promotion Screen"></v-radio>
             </v-radio-group>
             <div
                class="error-message"
                v-if="form.errors.has('redirect_to')"
                v-html="form.errors.get('redirect_to')"
                />
             </div>
             <div class="form-group" v-if="form.redirect_to == 'Product'">
              <label
              >{{ $t("message.PRODUCT") 
              }}<span class="required-star">*</span></label
              >
              <v-select
                :placeholder="$t('message.PRODUCT')"
                v-model="form.product_id"
                :options="products"
                label="name"
                :reduce="(product) => product.id"
                :selectOnTab="true"
                :class="{
                  'is-invalid': form.errors.has('product_id'),
                }"
              />
              <div
                class="error-message"
                v-if="
                  form.errors.has('product_id')
                "
                v-html="
                  form.errors.get('product_id')
                "
              />
            </div>
             <div class="form-group" v-if="form.redirect_to == 'Category'">
              <label
              >{{ $t("message.CATEGORY") 
              }}<span class="required-star">*</span></label
              >
              <v-select
                :placeholder="$t('message.CATEGORY')"
                v-model="form.product_category_id"
                :options="productCategories"
                label="name"
                :reduce="(productCategory) => productCategory.id"
                :selectOnTab="true"
                :class="{
                  'is-invalid': form.errors.has('product_category_id'),
                }"
              />
              <div
                class="error-message"
                v-if="
                  form.errors.has('product_category_id')
                "
                v-html="
                  form.errors.get('product_category_id')
                "
              />
            </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addHomeSlider"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_HOME_SLIDER") }}
              </button>
              <button
                @click.prevent="editHomeSlider"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_HOME_SLIDER") }}
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
  name: "addEditHomeSliderModal",
  props: ["homeSliderData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      homeSliders: [],
      editMode: "",
      products:[],
      productCategories:[],
      // Create a new form instance
      form: new form({
        id: "",
        title: "",
        image: "",
        redirect_to:"",
        product_id:"",
        product_category_id:"",
      }),
    };
  },
  methods: {
    addHomeSlider() {
      if (this.is("Super Admin") || this.can("create_home_slider")) {
        this.$Progress.start();
        this.form
          .post("api/homeSliders")
          .then(() => {
            Fire.$emit("reloadHomeSliders");
            $("#addEditHomeSliderModal").modal("hide");
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
    editHomeSlider() {
      if (this.is("Super Admin") || this.can("edit_home_slider")) {
        this.$Progress.start();
        this.form
          .put("api/homeSliders/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadHomeSliders");
            $("#addEditHomeSliderModal").modal("hide");
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
    // Reset Redirect To Field
    reset(){
      this.form.product_id = null;
      this.form.product_category_id = null;
    }
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditHomeSliderModal").on("show.bs.modal", function(e) {
      document.getElementById("image").value = "";
      Vue.nextTick().then(function () {
        if (e.relatedTarget) {
          that.editMode = true;
          form.fill(e.relatedTarget);
        } else {
          form.reset();
          that.editMode = false;
        }
        axios.get("api/getAllProducts").then((response) => {
          that.products = response.data;
          axios.get("api/getAllProductCategories").then((response) => {
            that.productCategories = response.data;
          });
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
