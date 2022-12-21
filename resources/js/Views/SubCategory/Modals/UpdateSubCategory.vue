<template>
  <form>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal2"
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
              Modificar Categoria
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
            <label for="name" class="form-label">Nombre</label>
            <input
              type="name"
              id="name"
              class="form-control form-control-user mb-3"
              autofocus
              name="name"
              v-model="form.name"
            />

            <label for="name" class="form-label">Descripcion</label>
            <input
              type="name"
              id="name"
              class="form-control form-control-user mb-3"
              autofocus
              name="name"
              v-model="form.description"
            />

            <label for="checkedPermissions" class="form-label"
              >Categorias</label
            >
            <multiselect
              v-model="form.category_id"
              id="checkedPermissions"
              :options="categories"
              :multiple="false"
              label="name"
              track-by="id"
            >
            </multiselect>

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
                >Modificar Categoria</span
              >
            </a>
          </div>
        </div>
      </div>
    </div>
  </form>
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
      categories: [],
    };
  },
  methods: {
    createPermission: function () {
      var url = "/subcategory/" + this.form.id;
      this.form.category_id =  this.form.category_id.id;
      axios
        .put(url, this.form)
        .then((response) => {
          this.errors = [];
          this.getClearFormObject();
          $("#exampleModal2").modal("hide");
          this.$emit("GetCreatedRol");
        })
        .catch((error) => {});
    },
    getKeeps: function () {
      var urlKeeps = "/category/get";
      axios
        .get(urlKeeps)
        .then((response) => {
          this.categories = response.data.data.map(function (elt) {
            return { name: elt.attributes.name, id: elt.id };
          });
        })
        .catch((err) => {});
    },
    UpdateGetRol(role) {
      this.form.name = role.attributes.name;
      this.form.description = role.attributes.description;
      this.form.category_id = { name: role.relationships.category.attributes.name, id: role.relationships.category.id };
      this.form.id = role.id;
      this.getKeeps();
    },
    getClearFormObject() {
      return {
        id: null,
        name: null,
        description: null,
        category_id: null,
      };
    },
  },
};
</script>
<style>
@import "~toastr/build/toastr.css";
@import "~vue-multiselect/dist/vue-multiselect.min.css";
</style>