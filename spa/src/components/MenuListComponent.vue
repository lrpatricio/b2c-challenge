<template>
  <div>
    <v-list>
      <v-list-item-group color="primary">
        <v-list-item v-for="(menu, index) in menus" :key="index">
          <v-list-item-content @click="$router.push(`/?category=${menu.id}`)">
            {{ menu.name }}
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </div>
</template>

<script>
import homeService from "@/services/home";
export default {
  name: "MenuList",
  data() {
    return {
      menus: [],
    };
  },
  created() {
    this.getMenuList();
  },
  methods: {
    async getMenuList() {
      const result = await homeService.menu();
      if (result.data) {
        console.log(result.data);
        this.menus = result.data;
      }
    },
  },
};
</script>

<style></style>
