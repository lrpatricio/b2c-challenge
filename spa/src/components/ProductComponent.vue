<template>
  <div>
    {{product}}
  </div>
</template>

<script>
import productApi from '../services/product';
export default {
  data() {
    return {
      product: 'Product'
    }
  },
   created() {
     productApi.findAll().then(result => {
       const product = result.data;
       console.log(product)
     });
  },
}
</script>

<style>

</style>