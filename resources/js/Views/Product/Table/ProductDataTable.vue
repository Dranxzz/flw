<template>
  <div class="row justify-content-center">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Productos</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Productos
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="col text-right">
            <a
              data-toggle="modal"
              v-on:click.prevent="CreateRol()"
              v-if="create"
              class="btn btn-primary text-white btn-icon-split mb-4"
            >
              <i class="fas fa-check"></i>
              <span class="text font-montserrat font-weight-bold"
                >Crear Producto</span
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
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Monto Minimo</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Monto Minimo</th>
                <th>Accion</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="keep in keeps" :key="keep.id">
                <td>{{ keep.id }}</td>
                <td>{{ keep.attributes.name }}</td>
                <td>{{ keep.attributes.description }}</td>
                <td>{{ keep.attributes.minimum_amount }}</td>
                <td>
                  <i
                    v-on:click.prevent="UpdatedPermission(keep)"
                    v-if="updated"
                    class="ico fas fa-edit fa-lg text-secondary"
                    style="cursor: pointer"
                    title="editar"
                  ></i>

                  <i
                    v-on:click.prevent="UpdatedOrCreateChar(keep)"
                    v-if="updated"
                    class="ico fas fa-piggy-bank fa-lg text-secondary"
                    style="cursor: pointer"
                    title="Usuario Recibe"
                  ></i>

                  <i
                    v-on:click.prevent="ExchangeCreate(keep)"
                    v-if="updated"
                    class="ico fas fa-sync fa-lg text-secondary"
                    style="cursor: pointer"
                    title="Monedas Intercambio"
                  ></i>

                  <i
                    v-on:click.prevent="deletePermission(keep)"
                    v-if="deletet"
                    :class="
                      keep.attributes.deleted_at
                        ? 'ico fas fa-trash-restore-alt fa-lg text-secondary'
                        : 'ico fas fa-trash fa-lg text-secondary'
                    "
                    style="cursor: pointer"
                    title="Borrar"
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
    <updated-create @GetCreatedRol="GetCreatedRol" ref="char" />
    <exchange-create @GetCreatedRol="GetCreatedRol" ref="exchange" />

  </div>
</template>
<script>
import axios from "axios";
import CreateRol from "../Modals/CreateProduct.vue";
import UpdateRol from "../Modals/UpdateProduct.vue";
import UpdatedCreate from "../Modals/UpdatedOrCreateChar.vue";
import ExchangeCreate from "../Modals/ExchangeCreate.vue";

export default {
  name: "ProductosDataTable",
  components: {
    CreateRol,
    UpdateRol,
    UpdatedCreate,
    ExchangeCreate
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
    };
  },
  methods: {
    getKeeps: function () {
      var urlKeeps = "/product/get";
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
    deletePermission: function (keep) {
      var url = "/product/delete/" + keep.id;
      axios.delete(url).then((response) => {
        this.getKeeps();
      });
    },

    CreateRol: function () {
      $("#exampleModal").modal("show");
    },

    UpdatedPermission(permission) {
      this.$refs.componente.UpdateGetRol(permission);
      $("#exampleModal2").modal("show");
    },

    UpdatedOrCreateChar(permission) {
      this.$refs.char.UpdateRol(permission);
      $("#exampleModal3").modal("show");
    },
    ExchangeCreate(permission) {
      this.$refs.exchange.UpdateRol(permission);
      $("#exampleModal4").modal("show");
    },

    GetCreatedRol: function () {
      this.getKeeps();
    },
  },
};
</script>