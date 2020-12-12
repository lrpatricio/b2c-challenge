<template>
  <div>
    <v-row>
      <v-col md="3">
        Menu
      </v-col>
      <v-col>
        <products-list-component></products-list-component>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import ProductsListComponent from './ProductsListComponent.vue'
export default {
  components: { ProductsListComponent },
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