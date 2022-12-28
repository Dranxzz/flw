<template>
  <div class="row justify-content-center">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Ordernes Ventas</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Ordernes Ventas
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="col text-right"></div>
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre Char</th>
                <th>Monto</th>
                <th>Producto</th>
                <th>Email</th>
                <th>Moneda</th>
                <th>Estatus</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Nombre Char</th>
                <th>Monto</th>
                <th>Producto</th>
                <th>Email</th>
                <th>Moneda</th>
                <th>Estatus</th>
                <th>Accion</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="keep in keeps" :key="keep.id">
                <td>{{ keep.id }}</td>
                <td>{{ keep.attributes.name_char }}</td>
                <td>{{ keep.attributes.amount }}</td>
                <td>{{ keep.relationships.product.attributes.name }}</td>
                <td>{{ keep.relationships.detail.attributes.email }}</td>
                <td>
                  {{
                    keep.relationships.detail.relationships.coin.attributes.name
                  }}
                </td>
                <td>{{ keep.attributes.status }}</td>
                <td>
                  <i
                    v-on:click.prevent="UpdatedPermission(keep, 'Aceptado')"
                    v-if="
                      updated && keep.attributes.status == 'En Verificación'
                    "
                    class="ico fas fa-check fa-lg text-secondary"
                    style="cursor: pointer"
                    title="Aceptar"
                  ></i>

                  <i
                    v-on:click.prevent="UpdatedPermission(keep, 'Rechazado')"
                    v-if="
                      updated && keep.attributes.status == 'En Verificación'
                    "
                    class="ico fas fa-times fa-lg text-secondary"
                    style="cursor: pointer"
                    title="Rechazar"
                  ></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <create-rol @GetCreatedRol="GetCreatedRol" />
    <update-rol @GetCreatedRol="GetCreatedRol" ref="componente" />
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "OrdernesVentasDataTable",
  components: {

  },
  props: {
    create: {
      type: Number,
      default: 0,
    },
    deletet: {
      type: Number,
      default: 0,
    },
    updated: {
      type: Number,
      default: 0,
    },
  },
  created() {
    this.getKeeps();
  },
  data() {
    return {
      keeps: [],
      form: this.getClearFormObject(),
    };
  },
  methods: {
    getKeeps: function () {
      var urlKeeps = "/order/get";
      axios
        .get(urlKeeps)
        .then((response) => {
          this.keeps = response.data.data;
          $("#dataTable").DataTable().destroy();
          this.$nextTick(function () {
            $("#dataTable").DataTable({
              // DataTable options here...
            });
          });
        })
        .catch((err) => {});
    },

    UpdatedPermission(permission, status) {
      var url = "/order/status";
      this.form.id = permission.id;
      this.form.status = status;
      axios
        .post(url, this.form)
        .then((response) => {
          this.errors = [];
          this.getKeeps();
        })
        .catch((error) => {});
    },

    GetCreatedRol: function () {
      this.getKeeps();
    },
    getClearFormObject() {
      return {
        id: null,
        status: null,
      };
    },
  },
};
</script>