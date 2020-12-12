<template>
  <div>
    <v-row>
      <v-col class="col-md-3">
        <v-list>
          <v-subheader>Menu</v-subheader>
          <v-list-item-group color="primary">
            <v-list-item v-for="(item, i) in items" :key="i">
              <v-list-item-content @click="$router.push(item.route)">
                <v-list-item-title v-text="item.text"></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </v-col>
      <v-col>
        <router-view></router-view>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import categoryApi from "../services/category";
export default {
  data() {
    return {
      category: "Category",
      items: [
        { text: "Categorias", route: "/admin/category" },
        { text: "Produtos", route: "/admin/product" },
      ],
    };
  },
  created() {
    this.loadCategory();
  },
  methods: {
    loadCategory() {
      categoryApi.findAll().then((result) => {
        this.category = result.data;
        console.log(this.category);
      });
    },
  },
};
</script>

<style></style>
