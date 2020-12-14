<template>
  <div>
    <v-row>
      <v-col md="3">
        Categorias
        <menu-list-component></menu-list-component>
      </v-col>
      <v-col md="9">
        <products-list-component></products-list-component>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import MenuListComponent from './MenuListComponent.vue'
import ProductsListComponent from './ProductsListComponent.vue'
export default {
  components: { ProductsListComponent, MenuListComponent },
  data() {
    return {
      home: 'HOME HAHAHAHAAH'
    }
  },
  created() {
    
  }
}
</script>

<style>

</style>