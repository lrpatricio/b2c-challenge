<template>
  <v-container>
    <v-row justify="space-around">
      <v-col md="3" v-for="product in products" :key="product.id">
        <v-card>
          <v-img  max-height="125" :src="product.image"  contain    class="grey darken-4"></v-img>

          <v-card-title>{{ product.name }}</v-card-title>

          <v-row justify="end">
            <v-col md="auto" style="padding: 1rem; color: #649c9c"
              ><b>{{ price(product.price) }}</b></v-col
            >
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import productService from "../services/product";

export default {
  name: "ProductsList",
  data() {
    return {
      products: null,
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      const result = await productService.findAll();
      this.products = result.data;
    },
    price(price) {
      return Number(price).toLocaleString("pt-br", {
        style: "currency",
        currency: "BRL",
      });
    },
  },
};
</script>

<style></style>
