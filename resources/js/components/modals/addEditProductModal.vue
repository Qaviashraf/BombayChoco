<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditProductModal"
      product="dialog"
      aria-labelledby="addEditProductModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditProductModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_PRODUCT") }}
            </h5>
            <h5 class="modal-title" id="addEditProductModalLabel" v-else>
              {{ $t("message.EDIT_PRODUCT") }}
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
          <form @submit.prevent="editMode ? editProduct() : addProduct()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">

              <!-- Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="$t('message.NAME')"
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

              <!-- Brands -->
              <div class="form-group" >
                <label>{{$t('message.BRANDS')}}<span class="required-star">*</span></label>
                <v-select v-model="form.brand_id" :options="brands"  label="name" :reduce="brand => brand.id" :selectOnTab="true" 
                  :key="form.brand_id"
                  :class="{ 'is-invalid': form.errors.has('brand_id') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('brand_id')"
                  v-html="form.errors.get('brand_id')"
                />
              </div>

              <!-- Product Flavour Dropdown -->
              <div class="form-group" >
                <label>{{$t('message.PRODUCT_FLAVOUR')}}</label>
                <v-select v-model="form.product_flavour_id" :options="productFlavours"  label="name" :reduce="productFlavour => productFlavour.id" :selectOnTab="true" 
                  :key="form.product_flavour_id"
                  :class="{ 'is-invalid': form.errors.has('product_flavour_id') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('product_flavour_id')"
                  v-html="form.errors.get('product_flavour_id')"
                />
              </div>

                <!-- Parent Category Dropdown -->
                <div class="form-group">
                <label>{{$t('message.PARENT_CATEGORY')}}<span class="required-star">*</span></label>
                <v-select v-model="form.product_category_id" :options="parentCategories"  label="name" :reduce="parentCategory => parentCategory.id" :selectOnTab="true" 
                  :key="form.product_category_id"
                  @input="getChildCategories($event)"
                  :class="{ 'is-invalid': form.errors.has('product_category_id') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('product_category_id')"
                  v-html="form.errors.get('product_category_id')"
                />
              </div>

              <!-- Child Category Dropdown -->
              <div class="form-group" v-if="form.product_category_id != '' && Object.keys(childCategories).length > 0">
                <label>{{$t('message.CHILD_CATEGORY')}}<span class="required-star">*</span></label>
                <v-select v-model="form.child_category_id" :options="childCategories"  label="name" :reduce="childCategory => childCategory.id" :selectOnTab="true" 
                  :key="form.child_category_id"
                  @input="emptyChildCategory($event)"
                  :class="{ 'is-invalid': form.errors.has('child_category_id') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('child_category_id')"
                  v-html="form.errors.get('child_category_id')"
                />
              </div>

                <div class="row">
                  <div class="col-md-3 col-xs-12 col-xl-3 col-lg-3" align="left">
                    <label>{{ $t("message.BAR_CODE") }}<span class="required-star">*</span></label>
                  </div>
                  <div class="col-md-3 col-xs-12 col-xl-3" align="left">
                    <label>{{ $t("message.QUANTITY") }}<span class="required-star">*</span></label>
                  </div>
                  <div class="col-md-3 col-xs-12 col-xl-3" align="left">
                    <label>{{ $t("message.SALE_PRICE") }}<span class="required-star">*</span></label>
                  </div>
                  <div class="col-md-2 col-xs-12 col-xl-2" align="left">
                    <label>{{ $t("message.WEIGHT") }}<span class="required-star">*</span></label>
                  </div>
                </div>
                <!-- Order Details row -->
                <div
                  class="row"
                  v-for="(product_variant, i) in form.product_variants"
                  :key="i"
                >
                  <div class="col-md-3 col-xs-12 col-xl-3 col-lg-3">
                    <input
                      v-model="product_variant.bar_code"
                      v-bind:placeholder="$t('message.BAR_CODE')"
                      type="text"
                      name="bar_code"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'product_variants.' + i + '.bar_code'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="
                        form.errors.has('product_variants.' + i + '.bar_code')
                      "
                      v-html="
                        form.errors.get('product_variants.' + i + '.bar_code')
                      "
                    />
                  </div>
                  <div class="col-md-3 col-xs-12 col-xl-3">
                    <input
                      v-model="product_variant.quantity"
                      v-bind:placeholder="$t('message.QUANTITY')"
                      type="text"
                      name="quantity"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'product_variants.' + i + '.quantity'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('product_variants.' + i + '.quantity')"
                      v-html="
                        form.errors.get('product_variants.' + i + '.quantity')
                      "
                    />
                  </div>
                  <div class="col-md-3 col-xs-12 col-xl-3">
                    <input
                      v-model="product_variant.sale_price"
                      v-bind:placeholder="$t('message.SALE_PRICE')"
                      type="text"
                      name="sale_price"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'product_variants.' + i + '.sale_price'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('product_variants.' + i + '.sale_price')"
                      v-html="
                        form.errors.get('product_variants.' + i + '.sale_price')
                      "
                    />
                  </div>
                  <div class="col-md-2 col-xs-12 col-xl-2" >
                    <input
                      v-model="product_variant.weight"
                      v-bind:placeholder="$t('message.WEIGHT')"
                      type="text"
                      name="weight"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'product_variants.' + i + '.weight'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('product_variants.' + i + '.weight')"
                      v-html="
                        form.errors.get('product_variants.' + i + '.weight')
                      "
                    />
                  </div>
                  <div class="col-md-1" align="center" v-if="form.product_variants.length>1 && i>=1">
                    <a class="btn btn-danger text-white" href='#' v-on:click.stop="deleteProductVariant(i, product_variant.id);"><i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </div>
                 <table class="table mt-4">
                    <tbody>
                        <tr> 
                          <td align="center" colspan="5" class="text-center mb-3"><button type="button" href='#' v-on:click.stop="form.product_variants.push({id: '', bar_code:'',quantity: '',sale_price: '', weight:''})" class="btn btn-success">{{$t('message.ADD_ROW')}}</button> 
                            </td>
                        </tr>
                    </tbody>
                  </table>
                <!-- Order Details row -->
                <!-- Order Details table -->   

              <!-- Featured Image -->
              <div class="form-group">
                <label>{{ $t("message.FEATURED_IMAGE") }}<span class="required-star">*</span></label>
                <span v-if="editMode && form.photo!=null"
                  ><img
                    v-bind:src="'images/product-images/' + form.photo"
                    width="50"
                    alt="Banner not found"
                /></span>

                <input
                  @change="addPhoto"
                  type="file"
                  id="photo"
                  name="photo"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('photo') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('photo')"
                  v-html="form.errors.get('photo')"
                />
              </div>
              <!-- End -->
              <div class="form-group">
                <label>Color Code</label>
                <v-color-picker v-model="form.color_code"></v-color-picker>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- Disable Checkbox -->
                  <div class="form-group">
                    <label>{{ $t("message.IS_DISABLED") }}</label>
                    <input
                      type="checkbox"
                      true-value="1"
                      false-value="0"
                      v-model="form.is_disabled"
                      name="is_disabled"
                      class="form-control"
                    />
                  </div>
                  <!-- End -->
                </div>
                <div class="col-md-6">
                  <!-- Disable Checkbox -->
                  <div class="form-group">
                    <label>Stock</label>
                    <input
                      type="checkbox"
                      true-value="1"
                      false-value="0"
                      v-model="form.stock"
                      name="stock"
                      class="form-control"
                    />
                  </div>
                  <!-- End -->
                </div>
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
              <!-- End -->
              <!-- Product Images-->
              <div class="form-group">
                <label>{{ $t("message.PRODUCT_IMAGES") }}&nbsp;
                  <i v-b-tooltip.hover.right title="Les dimensions conseillés sont 1080x1080 - Maximum 05 
                  images)" class="fa fa-info-circle"></i>
                </label>
                <span v-if="editMode"><span v-for="(data, i) in image" :key="i"><img  v-bind:src="'images/product-images/'+data.image" width="10%" alt="">
                <a  class="btn-cross-icon btn-danger-2 mr-10 mb-40" href='#' v-on:click.stop="deleteProductImages(i, data.id);">
                <i class="fas fa-times-circle"></i>
                </a>
                </span>
                </span>
                <div v-if="!editMode">
                <vue-upload-multiple-image 
                  v-model="form.image"
                  @upload-success="uploadImageSuccess"
                  @before-remove="beforeRemove"
                  @edit-image="editImage"
                  idUpload="myIdUpload"
                  editUpload="myIdEdit"
                  ></vue-upload-multiple-image>
                <div
                  class="error-message"
                  v-if="form.errors.has('image')"
                  v-html="form.errors.get('image')"
                />
                </div>
                <div v-else>
                <vue-upload-multiple-image 
                  v-model="form.image_copy"
                  @upload-success="uploadImageSuccess"
                  @before-remove="beforeRemove"
                  @edit-image="editImage"
                  idUpload="myIdUpload"
                  editUpload="myIdEdit"
                  ></vue-upload-multiple-image>
                <div
                  class="error-message"
                  v-if="form.errors.has('image_copy')"
                  v-html="form.errors.get('image_copy')"
                />
                </div>
              </div>
              <!-- End -->
              <div>
                  <h2 class="text-center">SEO Section</h2>
                  <br
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>More Information</label>
                          <textarea
                            v-model="form.more_info"
                            v-bind:placeholder="'More Information'"
                            type="text"
                            name="more_info"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('more_info') }"
                          ></textarea>
                          <div
                            class="error-message"
                            v-if="form.errors.has('more_info')"
                            v-html="form.errors.get('more_info')"
                          />
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>One Line Description</label>
                          <textarea
                            v-model="form.one_line_description"
                            v-bind:placeholder="'One Line Description'"
                            type="text"
                            name="one_line_description"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('one_line_description') }"
                          ></textarea>
                          <div
                            class="error-message"
                            v-if="form.errors.has('one_line_description')"
                            v-html="form.errors.get('one_line_description')"
                          />
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addProduct"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_PRODUCT") }}
              </button>
              <button
                @click.prevent="editProduct"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                Update
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
import VueUploadMultipleImage from 'vue-upload-multiple-image';
import { VueEditor } from "vue2-editor";
export default {
  name: "addEditProductModal",
  props: ["productData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      products: [],
      parentCategories: [],
      childCategories:[],
      productFlavours:[],
      brands: [],
      image:[],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        color_code:"",
        title: "",
        slug: "",
        meta_title: "",
        meta_description: "",
        brand_id:"",
        child_category_id:"",
        product_category_id: "",
        product_flavour_id: "",
        image: [],
        image_copy: [],
        is_disabled: 0,
        stock: 0,
        description:"",
        product_variants:[{id:"",bar_code:"",quantity:"",sale_price:"",weight:""}],
      }),
    };
  },
  components: {
    Vue,
    VueUploadMultipleImage,
    VueEditor
  },
  methods: {
    addProduct() {
      if (this.is("Super Admin") || this.can("create_product")) {
        this.$Progress.start();
        //swap the parent category to child category
        if(this.form.child_category_id != '')
        {
          this.form.product_category_id = this.form.child_category_id;
        }
        this.form
          .post("api/products")
          .then(() => {
            Fire.$emit("reloadProducts");
            $("#addEditProductModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch((error) => {
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
    editProduct() {
      if (this.is("Super Admin") || this.can("edit_product")) {
        this.$Progress.start();
        this.form.image = this.image;
        //swap the parent category to child category
        if(this.form.child_category_id != '')
        {
          this.form.product_category_id = this.form.child_category_id;
        }
        this.form
          .put("api/products/" + this.form.id)
          .then(() => {
            this.form.image_copy = [];
            Fire.$emit("reloadProducts");
            $("#addEditProductModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch((error) => {
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
    // Upload Product images work
    uploadImageSuccess(formData, index, fileList) {
      fileList.map((f)=>{
      })
      if (this.editMode) {
        this.form.image_copy = fileList;
      }else{
      this.form.image = fileList;
      }
    },
    beforeRemove (index, done, fileList) {
      var r = confirm("remove image")
      if (r == true) {
        done()
      } else {
      }
    },
    editImage (formData, index, fileList) {
    },
    addPhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    //Delete Product Images
    deleteProductImages(i, id=null) {
    if (this.is("Super Admin") || this.can("edit_product")){
      if(this.editMode){
          swal.fire({
          text: this.$t("message.DELETE_MESSAGE_REVERT"),
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085D6",
          cancelButtonColor: "#d33",
          confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT")
        }).then(result => {
          if (result.value) {
            // Send request to the server
            if(id!=""){
              this.form
              .delete("api/removeProductImages/" + id)
              .then(() => {
                this.image.splice(i, 1);
                swal.fire(
                  "Deleted!",
                  this.$t("message.DELETE_MESSAGE_SUCCESS"),
                  "success"
                );
              })
              .catch(() => {
                swal(
                  "Failed!",
                  this.$t("message.DELETE_MESSAGE_ERROR"),
                  "warning"
                );
              });
            }else{
              this.image.splice(i, 1);
                swal.fire(
                  "Deleted!",
                  this.$t("message.DELETE_MESSAGE_SUCCESS"),
                  "success"
                );
            }
          }
        });
      }else{
        this.image.splice(i, 1);
      }
      }else{
        swal.fire({
          text: this.$t("message.unAuthorizedText"),
          type: "warning",
        })
      }
    },
    // Delete Product Variants
    deleteProductVariant(i, id = null) {
      if (this.is('Super Admin') || this.can("delete_product")) {
        if (this.editMode) {
          swal
            .fire({
              title: this.$t("message.CONFIRM"),
              text: this.$t("message.DELETE_MESSAGE_REVERT"),
              type: "warning",
              showCancelButton: true,
              cancelButtonText: this.$t('message.CANCEL'),
              confirmButtonColor: "#3085D6",
              cancelButtonColor: "#d33",
              confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
            })
            .then((result) => {
              if (result.value) {
                // Send request to the server
                if (id != "") {
                  axios
                    .delete("api/removeProductVariants/" + id)
                    .then(() => {
                      this.form.product_variants.splice(i, 1);
                      swal.fire(
                        this.$t("message.DELETED"),
                        this.$t("message.DELETE_MESSAGE_SUCCESS"),
                        "success"
                      );
                    })
                    .catch(() => {
                      swal(
                        "Failed!",
                        this.$t("message.FAILED"),
                        this.$t("message.DELETE_MESSAGE_ERROR"),
                        "warning"
                      );
                    });
                } else {
                  this.form.product_variants.splice(i, 1);
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.product_variants.splice(i, 1);
        }
      } else {
        swal.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
          type: "warning",
        });
      }
    },
    // Get Child Categories Via Parent Category Id
    getChildCategories(parentCategoryId){
      if(parentCategoryId)
        {
          axios.get("/api/getChildCategories?parent_id=" + parentCategoryId)
            .then((response) => {
                this.childCategories = response.data;
            }); 
            this.form.child_category_id = '';
        }
        else
        {
          this.childCategories = [];  
          this.form.child_category_id = '';
        }
    },
    // Empty child category
    emptyChildCategory(id)
    {
      if(!id)
      {
        this.form.child_category_id = '';
      }
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditProductModal").on("show.bs.modal", function (e) {
      document.getElementById("photo").value = "";
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        form.photo = e.relatedTarget.photo;
        const productVariants = [];
        Array.from(e.relatedTarget.product_variants).forEach(item => {
          productVariants.push(item);
        })
        form.product_variants = productVariants; 
        // Manually Fill Images
        form.image_copy = [];
        const image = [];
         Array.from(e.relatedTarget.product_images).forEach(item => {
            image.push(item);
        })
        that.image = image

        // work for child and parent category
        if(e.relatedTarget.product_category.parent_category)
        {
          that.getChildCategories(e.relatedTarget.product_category.parent_id);
          that.form.child_category_id = e.relatedTarget.product_category_id;
          that.form.product_category_id = e.relatedTarget.product_category.parent_id;
        }
        else
        {
          that.getChildCategories(e.relatedTarget.product_category_id);
          that.form.child_category_id = '';
          that.childCategories = [];
        }
      } else {
        form.reset();
        that.editMode = false;
      }
      //get all parent categories
      axios.get('/api/getAllParentCategories')
        .then((response)=>{
            that.parentCategories = response.data;
            //get all product flavours
            axios.get('/api/getProductFlavours')
              .then((response)=>{
                  that.productFlavours = response.data;
                  // get all brands
                   axios.get('/api/getBrands')
                  .then((response)=>{
                      that.brands = response.data;
                  })
              })
        }).catch(() => {
          that.$Progress.fail();
          toast.fire({
          icon: "error",
          title: that.$t("message.SOMETHING_WENT_WRONG"),
        });
      });
    });
  },
};
</script>