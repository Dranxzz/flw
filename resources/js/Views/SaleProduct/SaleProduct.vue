<template>
  <div>
    <button
      v-on:click.prevent="CreateOrder()"
      class="button button-a button-big button-rouded"
    >
      Vender
    </button>

    <form>
      <!-- Modal -->
      <div
        class="modal fade"
        id="SaleOrder"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header py-2">
              <h5
                class="modal-title title-page text-secondary"
                id="exampleModalLabel"
              >
                Vender
              </h5>
              <a
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <label for="name" class="form-label">Nombre Char</label>
              <input
                type="name"
                id="name"
                class="form-control form-control-user mb-3"
                autofocus
                name="name"
                v-model="form.name_char"
              />

              <label for="name" class="form-label">Monto</label>
              <input
                type="number"
                id="name"
                class="form-control form-control-user mb-3"
                autofocus
                name="name"
                v-model="form.amount"
              />

              <label for="checkedPermissions" class="form-label">Moneda</label>
              <multiselect
                v-model="form.coin_id"
                id="checkedPermissions"
                :options="coins"
                :multiple="false"
                label="name"
                track-by="id"
              >
              </multiselect>

              <label for="name" class="form-label">Correo</label>
              <input
                type="name"
                id="name"
                class="form-control form-control-user mb-3"
                autofocus
                name="name"
                v-model="form.email"
              />
            </div>
            <div class="modal-footer">
              <a
                class="btn btn-danger text-white btn-icon-split mb-4"
                data-dismiss="modal"
              >
                <span class="text font-montserrat font-weight-bold"
                  >Cancelar</span
                >
              </a>
              <a
                v-on:click.prevent="createPermission()"
                class="btn btn-primary text-white btn-icon-split mb-4"
              >
                <span class="text font-montserrat font-weight-bold"
                  >Vender</span
                >
              </a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import toastr from "toastr";
import Multiselect from "vue-multiselect";

export default {
  name: "SaleProduct",
  components: {
    Multiselect,
  },
  created() {
    this.getKeeps();
  },
  props: {
    product: {
      type: String,
      default: 0,
    },
  },
  data() {
    return {
      form: this.getClearFormObject(),
      coins: [],
    };
  },
  methods: {
    CreateOrder: function () {
      $("#SaleOrder").modal("show");
    },
    createPermission: function () {
      var url = "/order/save";
      this.form.coin_id =this.form.coin_id.id;
      axios
        .post(url, this.form)
        .then((response) => {
          this.errors = [];
          this.getClearFormObject();
          toastr.success("Orden Creada Con Exito");
          $("#SaleOrder").modal("hide");
        })
        .catch((error) => {});
    },
    getKeeps: function () {
      var urlKeeps = "/coin/get";
      axios
        .get(urlKeeps)
        .then((response) => {
          this.coins = response.data.data.map(function (elt) {
            return { name: elt.attributes.name, id: elt.id };
          });
        })
        .catch((err) => {});
    },
    getClearFormObject() {
      return {
        name_char: null,
        amount: null,
        status: "En Verificación",
        product_id: this.product,
        coin_id: null,
        email: null,
      };
    },
  },
};
</script>
<style>
@import "~toastr/build/toastr.css";
@import "~vue-multiselect/dist/vue-multiselect.min.css";
</style>
