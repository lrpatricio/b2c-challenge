<template>
  <div>
    {{ product }}
  </div>
</template>

<script>
import productApi from "../services/product";
export default {
  data() {
    return {
      product: "Product",
    };
  },
  computed: {
    query() {
      console.log(this.$route.query);
      return "";
    },
  },
  methods: {
    async getProducts() {
      productApi.findAll().then((result) => {
        const product = result.data;
        console.log(product);
      });
    },
  },
  created() {
    this.getProducts();
  },
  watch: {
    query() {
      this.getProducts();
    },
  },
};
</script>

<style></style>
