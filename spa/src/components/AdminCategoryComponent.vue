<template>
  <div>
    <v-container>
      <v-btn color="primary" to="/admin/category/novo">Adicionar</v-btn>
    </v-container>

    <v-simple-table>
      <thead>
        <tr>
          <th class="text-left">#Id</th>
          <th class="text-left">Status</th>
          <th class="text-left">Nome</th>
          <th class="text-left">Cor</th>
          <th class="text-left">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="category in categories" :key="category.id">
          <td>{{ category.id }}</td>
          <td>{{ category.status }}</td>
          <td>{{ category.name }}</td>
          <td>{{ category.color }}</td>
          <td>
             <v-btn color="primary" :to="`category/editar/${category.id}`">
              <v-icon left> mdi-pencil </v-icon>
              Editar
            </v-btn>

            |
            
            <v-btn color="error" @click="categoryRemove(category)">
              <v-icon left> mdi-delete </v-icon>
              Excluir
            </v-btn>
          </td>
        </tr>
      </tbody>
    </v-simple-table>
  </div>
</template>

<script>
import adminCategory from "../services/category";
export default {
  data() {
    return {
      categories: "",
    };
  },

  created() {
    this.getCategory();
  },

  methods: {
    getCategory() {
      adminCategory.findAll().then((result) => {
        this.categories = result.data;
      });
    },
    async categoryRemove(category) {
      const confirm = window.confirm(`Deseja excluir ${category.name}`);
      if (confirm) {
        await adminCategory.categoryRemove(category.id);
        this.getCategory();
      }
    },
  },
};
</script>

<style>
</style>