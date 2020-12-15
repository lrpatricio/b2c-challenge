<template>
  <div>
    <h2>Adicionar uma nova categoria</h2>

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
        label="Ativa ou Desativada?"
        required
      ></v-select>

      <v-select
        v-model="color"
        :items="statusColors"
        :rules="[(v) => !!v || 'Item is required']"
        label="Qual a cor dessa categoria?"
        required
      ></v-select>

      <v-btn
        color="error"
        class="mr-4"
        @click="saveCategory"
        :disabled="!valid"
      >
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
    async saveCategory() {
      const result = await adminCategory.create({
        name: this.name,
        status: this.status,
        color: this.color,
      });
      if (result.status === 201 || result.status == 200) {
        alert("Categoria cadastrada com sucesso");
        this.$router.push("/admin/category");
      }
    },
  },
};
</script>

<style>
</style>