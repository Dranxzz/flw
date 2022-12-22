<template>
  <div>
    <form>
      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal4"
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
                Monto Intercambio
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
              <div class="table-responsive">
                <div class="col text-right">
                  <a
                    data-toggle="modal"
                    v-on:click.prevent="CreateRol()"
                    class="btn btn-primary text-white btn-icon-split mb-4"
                  >
                    <i class="fas fa-check"></i>
                    <span class="text font-montserrat font-weight-bold"
                      >Crear Intercambio</span
                    >
                  </a>
                </div>
                <table
                  class="table table-bordered"
                  id="dataTable"
                  width="100%"
                  cellspacing="0"
                >
                  <thead>
                    <tr>
                      <th>Moneda</th>
                      <th>Producto</th>
                      <th>Monto Intercambio</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Moneda</th>
                      <th>Producto</th>
                      <th>Monto Intercambio</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr v-for="exchange in exchangess" :key="exchange.id">
                      <td>{{ exchange.relationships.coin.attributes.name }}</td>
                      <td>
                        {{ exchange.relationships.product.attributes.name }}
                      </td>
                      <td>{{ exchange.attributes.amount }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
            </div>
          </div>
        </div>
      </div>
    </form>

    <form>
      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal5"
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
                Crear intercambio
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
              <label for="checkedPermissions" class="form-label">Monedas</label>
              <multiselect
                v-model="form.coin_id"
                id="checkedPermissions"
                :options="coins"
                :multiple="false"
                label="name"
                track-by="id"
              >
              </multiselect>

              <label for="name" class="form-label">Monto Intercambio</label>
              <input
                type="number"
                id="name"
                class="form-control form-control-user mb-3"
                autofocus
                name="name"
                min="150"
                v-model="form.amount"
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
                v-on:click.prevent="createExchange()"
                class="btn btn-primary text-white btn-icon-split mb-4"
              >
                <span class="text font-montserrat font-weight-bold"
                  >Crear Producto</span
                >
              </a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
<style>
@import "~vue-multiselect/dist/vue-multiselect.min.css";
</style>

<script>
import axios from "axios";
import Multiselect from "vue-multiselect";

export default {
  name: "RolesUpdate",
  components: {
    Multiselect,
  },

  created() {},
  data() {
    return {
      form: this.getClearFormObject(),
      coins: [],
      exchangess: [],
    };
  },
  methods: {
    createExchange: function () {
      var url = "/product/create/exchange";
      this.form.coin_id = this.form.coin_id.id;
      axios
        .post(url, this.form)
        .then((response) => {

          this.errors = [];
          this.getClearFormObject();
          this.exchangess = response.data.data.relationships.exchange;

          $("#exampleModal5").modal("hide");
          this.$emit("GetCreatedRol");
        })
        .catch((error) => {});
    },
    UpdateRol(role) {
      this.form.id = role.id;
      this.exchangess = role.relationships.exchange;
      this.getKeeps();
    },

    CreateRol: function () {
      $("#exampleModal5").modal("show");
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
        id: null,
        coin_id: null,
        amount: null,
      };
    },
  },
};
</script>
<style>
@import "~toastr/build/toastr.css";
@import "~vue-multiselect/dist/vue-multiselect.min.css";
</style>