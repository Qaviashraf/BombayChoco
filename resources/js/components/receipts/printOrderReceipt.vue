<template>
  <div id="Export-PDF" ref="document">
    <div class="container">
      <div id="printSaleData">
        <div class="pdf-header">
          <img class="pdfLogo" v-bind:src="'images/logo/'+$store.getters.settings.logo" alt="Logo">
        </div>
        <div class="container-fluid ">
          <div class="row">
            <div class="col-6">
              <h5>K2 (Jadida)</h5>
              <div class="contact-info">
                <p>SODISCO Sarlu<br>
                  15,rue Ingereza - Tsralalena<br>
                  Antananarivo 101 - Madagascar<br>
                  Tél: (+261)-3227 000 26/21/22/100/123<br>
                  NIF: 4001879022/ STAT: 4690011 2015<br>0 10127
                </p>
              </div>
            </div>
            <div class="col-6">
              <h5>FACTURE</h5>
              <div class="contact-info">
                  <h5 v-if="printOrderReceiptData.order_number">N° {{printOrderReceiptData.order_number}}</h5>
                  <h5 v-else>N° -</h5>
                  <p v-if="printOrderReceiptData.order_date"> Date: {{printOrderReceiptData.order_date | formatDate}}  &nbsp; &nbsp; </p>
                  <p v-else>Date: -</p>
                  <!-- Enheance: 17/10/2022 -->
              </div>
                <div style=" border: 1px solid black;
                border-radius: 10px;">
                  <div class="ml-2 mt-1" v-if="printOrderReceiptData.customer">
                    <h5 class="text-uppercase" v-if="printOrderReceiptData.customer && printOrderReceiptData.customer.company_name || printOrderReceiptData.customer.username"><span v-if="printOrderReceiptData.customer.company_name">{{printOrderReceiptData.customer.company_name}} /</span> {{printOrderReceiptData.customer.username}}</h5>
                    <h5 v-else>-</h5>
                    <p v-if="printOrderReceiptData.customer && printOrderReceiptData.customer.address|| printOrderReceiptData.customer.telephone">Livraison: {{printOrderReceiptData.customer.address}}
                    <br>Tél: {{printOrderReceiptData.customer.telephone}}
                    </p>
                    <p v-else>Livraison: - <br>Tél: -</p>
                  </div>
                  
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <table class="table">
                <thead class="table-borderless">
                  <tr>
                    <th>Code</th>
                    <th>Désignation</th>
                    <th>Qté</th>
                    <th>PU</th>
                    <th>Montant</th>
                  </tr>
                </thead>
                <tbody class="table-borderless">
                 <tr v-for="data ,index in printOrderReceiptData.order_details" :key="index">
                    <td v-if="data.product">{{data.product.code}}</td>
                    <td v-if="data.product">{{data.product.name}}</td>
                    <td>{{data.quantity}}</td>
                    <td v-if="data.campaign_id == null">{{data.price| currency("Ar", 2, {
                      thousandsSeparator: ".",
                      decimalSeparator: ",",
                      symbolOnLeft: false,
                      spaceBetweenAmountAndSymbol: true,
                    })}}</td>
                    <td v-else>{{data.price_after_discount| currency("Ar", 2, {
                      thousandsSeparator: ".",
                      decimalSeparator: ",",
                      symbolOnLeft: false,
                      spaceBetweenAmountAndSymbol: true,
                    })}}</td>
                    <td>{{data.grand_total| currency("Ar", 2, {
                      thousandsSeparator: ".",
                      decimalSeparator: ",",
                      symbolOnLeft: false,
                      spaceBetweenAmountAndSymbol: true,
                    })}}</td>
                 </tr>
                 <tr>
                   <td colspan="5">
                   </td>
                  </tr>
                 <tr>
                   <td colspan="5">
                   </td>
                  </tr>
                  <tr>
                    <td><b>Total</b></td>
                    <td></td>
                    <td><b>{{totalQuantity}}</b></td>
                    <td></td>
                    <td><b>{{printOrderReceiptData.grand_total| currency("Ar", 2, {
                      thousandsSeparator: ".",
                      decimalSeparator: ",",
                      symbolOnLeft: false,
                      spaceBetweenAmountAndSymbol: true,
                    })}}</b></td>
                  </tr>
                </tbody>
              </table>
              <p>{{numberInWords() + " Ariary" }}<br>({{printOrderReceiptData.grand_total| currency("Ar", 2, {
                thousandsSeparator: ".",
                decimalSeparator: ",",
                symbolOnLeft: false,
                spaceBetweenAmountAndSymbol: true,
              })}}, Soit, {{printOrderReceiptData.grand_total*5| currency("Fmg", 2, {
                thousandsSeparator: ".",
                decimalSeparator: ",",
                symbolOnLeft: false,
                spaceBetweenAmountAndSymbol: true,
              })}} )</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            <h6>Conditions Générale De Vente</h6>
            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
var writtenNumber = require("written-number");
import html2pdf from "html2pdf.js";
export default {
  name: "printOrderReceipt",
  props: ["printOrderReceiptData", "printFlag","pdfFlag"],
  data() {
    return {
      currentLanguage: currentLanguage,
      selectedOrder: {},
      setting:{},
    };
  },
  components: {
    html2pdf
  },
  computed:{
    totalQuantity() {
      if (this.printOrderReceiptData && this.printOrderReceiptData.order_details &&this.printOrderReceiptData.order_details.length > 0) {
        return this.printOrderReceiptData.order_details.reduce((sum, i) => {
          return sum + +i.quantity;
        }, 0);
      }
    },
  },
  methods: {
    //Export Cards In PDF
    submit(){
        let data = Object.assign({}, this.$refs);
        // data.hide.removeAttribute("visible");
        html2pdf(data.document, {
          
          margin: 1,
          filename: "document.pdf",
          image: {
            type: "jpeg", 
            quality: 0.98,
          },
          html2canvas: {
            dpi: 192,
            letterRendering: true
          },
          jsPDF: {
            unit: "in",
            format: "A4",
            orientation: "portrait"
          },
        });
    },
    // it will return the number in words
    numberInWords() {
      let numbers = this.printOrderReceiptData.grand_total;
      return writtenNumber(numbers, { lang: this.currentLanguage });
    },
    printSale() {
      this.$htmlToPaper("printSaleData");
    },
  },
  mounted() {
    this.$store.dispatch('getSettingsFromAPI');
    this.printFlag.$on("printFlag", () => {
      setTimeout(() => {
        
        this.printSale();
      }, 1000);
     
    })
    this.pdfFlag.$on("pdfFlag", () => {
      setTimeout(() => {
        this.submit();
      }, 1000);
     
    });
  }
};
</script>