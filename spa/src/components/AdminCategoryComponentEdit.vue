<template>
  <div>
    <v-container>
      <v-btn color="primary" to="/admin/category">Categorias</v-btn>
    </v-container>

    <v-form ref="form" v-model="valid" lazy-validation>
      <v-text-field v-model="name" label="Nome para o produto" required>
      </v-text-field>

      <v-select
        v-model="status"
        :items="statusData"
        :rules="[(v) => !!v || 'Item is required']"
        label="Ativado/Desativado"
        required
      ></v-select>

      <v-select
        v-model="color"
        :items="statusColors"
        :rules="[(v) => !!v || 'Item is required']"
        label="Escolha a cor do seu produto"
        required
      ></v-select>

      <v-btn color="primary" class="mr-4" @click="updateCategory">
        Salvar
      </v-btn>
    </v-form>
  </div>
</template>

<script>
import adminCategory from "../services/category";
export default {
  data() {
    return {
      id: this.$route.params.id,
      name: "",
      status: 0,
      color: "",
      statusData: ["Ativado", "Desativado"],
      statusColors: ["Amarelo", "Preto", "Vermelho", "Branco"],
      valid: true,
    };
  },

  created() {
    this.getCategorySelected();
  },

  methods: {
    async getCategorySelected() {
      const category = await adminCategory.findById(this.id);
      const { name, status, color } = category.data;
      this.name = name;
      this.status = status;
      this.color = color;
    },
    async updateCategory() {
      const category = {
        id: this.id,
        name: this.name,
        status: this.status,
        color: this.color,
      };
      const { status } = await adminCategory.categoryUpdate(
        category.id,
        category
      );
      if (status === 200) {
        this.$router.push("/admin/category");
      } else {
        alert("Houve um problema ao salvar os dados");
        return;
      }
    },
  },
};
</script>

<style>
</style>