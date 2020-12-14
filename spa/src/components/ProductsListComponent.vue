<template>
  <v-container>
    <v-row justify="space-around" v-if="!loading">
      <v-col md="4" v-for="product in products" :key="product.id">
        <v-card>
          <v-img
            max-height="150"
            :src="product.image"
             class="grey darken-4"
          ></v-img>

          <v-card-title>{{ product.name }}</v-card-title>

          <v-row justify="end">
            <v-col md="auto" style="padding: 1rem; color: #649c9c"
              ><b>{{ price(product.price) }}</b></v-col
            >
          </v-row>
        </v-card>
      </v-col>
    </v-row>

    <v-row v-if="loading" justify="center">
        <v-col md="3">
            <v-img src="../assets/img/spinner.svg" max-width="80" />
        </v-col>
    </v-row>
  </v-container>
</template>

<script>
import productService from "../services/product";
import homeService from "@/services/home";

export default {
  name: "ProductsList",
  data() {
    return {
      products: null,
      loading: false,
    };
  },
  computed: {
    query() {
      return this.$route.query.category || null;
    },
  },
  created() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      let result = "";
      this.products = [];
      this.loading = true;
      if (this.query) {
        result = await homeService.productByCategory(this.query);
      } else {
        result = await productService.findAll();
      }
      this.loading = false;
      this.products = result.data;
    },
    price(price) {
      return Number(price).toLocaleString("pt-br", {
        style: "currency",
        currency: "BRL",
      });
    },
  },
  watch: {
    query() {
      this.getProducts();
    },
  },
};
</script>

<style></style>
