<template>
<div>
 <!-- Modal -->
 <div
 class="modal fade"
 id="importExcelFileModal"
 unit="dialog"
 aria-labelledby="importExcelFileModalLabel"
 aria-hidden="true" data-keyboard="false" data-backdrop="static"
>
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5
         class="modal-title"
         id="importExcelFileModalLabel"
       >
         {{ $t("message.IMPORT_EXCEL_SHEET") }}
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
     <form @submit.prevent="addImportSheet()">
       <input type="hidden" name="_token" :value="csrf" />
       <div class="modal-body">

         <!-- Excel File -->
         <div class="form-group">
           <label
             >{{ $t("message.FILE")
             }}<span class="required-star">*</span></label
           >
           <input
            @change="excelFile"
            :key="fileInputKey"
            type="file"
            id="excel_file"
            name="excel_file"
            class="form-control"
            :class="{ 'is-invalid': form.errors.has('excel_file') }"
            />
            <div
                class="error-message"
                v-if="form.errors.has('excel_file')"
                v-html="form.errors.get('excel_file')"
            />
            <!-- Validation Message For Excel Sheet -->
            <div v-for="error,i in form.errors" :key="i">
                <span
                v-for="col,index in error" :key="index"
                class="error-message"
                >
                {{col[index]}}
                </span>
            </div>
         </div>
       </div>
       <div class="modal-footer">
         <button
           @click.prevent="addImportSheet"
           type="submit"
           class="btn btn-primary"
         >
           {{ $t("message.IMPORT_EXCEL_SHEET") }}
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
name: "importExcelFileModal",
    data() {
    return {
        csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
        fileInputKey:0,
        errorMessage:[],
        form: new form({
            id:"",
            excel_file:"",
        }),
    }
},
methods: {
    excelFile(e) {
      let file = e.target.files[0];
      this.form.excel_file = file;
    },
    addImportSheet(){
      if (this.is("Super Admin") || (this.can("edit_product"))) {
        this.$Progress.start();
        this.form
        .post("api/import")
        .then((response) => {
            Fire.$emit("reloadProducts");
            $("#importExcelFileModal").modal("hide");
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
       }
    }
},
mounted() {
    var form = this.form;
    var that = this;
    $("#importExcelFileModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function() {
            that.fileInputKey++;
            form.reset();
        });
    });
  },
}
</script>