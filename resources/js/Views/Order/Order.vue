<template>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <roles-data-table
        :create="create"
        :deletet="deletet"
        :updated="updated"
      />
    </div>
  </div>
</template>

<script>
import RolesDataTable from "./Table/OrderDataTable.vue";

export default {
  name: "Category",
  components: {
    RolesDataTable,
  },
  props: {
    create: {
      type: String,
      default: 0,
    },
    deletet: {
      type: String,
      default: 0,
    },
    updated: {
      type: String,
      default: 0,
    },
  },
};
</script>