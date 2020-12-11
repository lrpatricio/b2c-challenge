<template>
  <div>
   <router-view></router-view>
  </div>
</template>

<script>
import categoryApi from '../services/category';
export default {
  data() {
    return {
      category: 'Category'
    }
  },
   created() {
     this.loadCategory();
  },
  methods:{
    loadCategory() {
      categoryApi.findAll().then(result => {
       this.category = result.data;
       console.log(this.category)
     });
    }
  }
}
</script>

<style>

</style>