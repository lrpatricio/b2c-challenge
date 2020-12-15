<template>
  <div>
    <h2>Editar a categoria: {{ name }}</h2>

    <v-form ref="form" v-model="valid">
      <v-text-field
        v-model="name"
        :rules="[(v) => !!v || 'Campo obrigatório']"
        label="Nome para a categoria"
        required
      >
      </v-text-field>

      <v-select
        v-model="status"
        :items="statusData"
        item-value="value"
        item-text="text"
        :rules="[(v) => !!v || 'Item is required']"
        label="Ativada/Desativada"
        required
      ></v-select>

      <v-select
        v-model="color"
        :items="statusColors"
        item-value="value"
        item-text="text"
        :rules="[(v) => !!v || 'Item is required']"
        label="Escolha a cor do categoria"
        required
      ></v-select>

      <v-btn color="primary" class="mr-4" @click="updateCategory" :disabled="!valid">
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
      valid: "",
      id: this.$route.params.id,
      name: "",
      status: "0",
      color: "",
      statusData: [
        { value: "1", text: "Ativo" },
        { value: "0", text: "Desativo" },
      ],
      statusColors: ["Amarelo", "Preto", "Vermelho", "Branco"],
      
    };
  },

  created() {
    this.getCategorySelected();
  },

  methods: {
    async getCategorySelected() {
      const result = await adminCategory.findById(this.id);
      this.name = result.data.name;
      this.status = result.data.status;
      this.color = result.data.color;
      console.log(this.status)
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