<template>
  <v-container>
    <v-row>
      <v-col v-for="product in products" :key="product.id">
        <v-card>
          <v-img
            height="250"
            :src="product.image"
          ></v-img>

          <v-card-title>{{ product.name }}</v-card-title>
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
  },
};
</script>

<style></style>
