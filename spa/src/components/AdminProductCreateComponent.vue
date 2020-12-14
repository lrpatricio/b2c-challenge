<template>
  <div>
    <h2>Adicionar novo produto</h2>
    <v-form ref="form" v-model="valid">
      <v-text-field
        v-model="name"
        :rules=" [v => !!v || 'Campo obrigatório']"
        label="Nome para o produto"
        required
      >
      </v-text-field>

      <v-text-field
        v-model="price"
        :rules="[(v) => !!v || 'Campo obrigatório']"
        label="Valor do produto"
        required
      >
      </v-text-field>

      <v-select
        v-model="status"
        :items="statusData"
        item-value="value"
        item-text="text"
        :rules="[(v) => !!v || 'Item is required']"
        label="Ativado/Desativado"
        required
      ></v-select>

      <v-select
        v-model="categoryId"
        :items="categories"
        :rules="[(v) => !!v || 'Categoria é obrigatório']"
        item-text="name"
        item-value="id"
        label="Escolha a categoria do produto"
        required
      ></v-select>

      <v-btn color="error" class="mr-4" @click="saveProduct" :disabled="!valid">
        Salvar
      </v-btn>
    </v-form>
  </div>
</template>

<script>
import categoryService from "../services/category";
import productService from "../services/product";

export default {
  name: "AdminProductCreate",
  data() {
    return {
      valid: "",
      name: "",
      price: 0,
      status: "0",
      statusData: [
        { value: "1", text: "Ativo" },
        { value: "0", text: "Desativo" },
      ],
      categoryId: null,
      categories: [],
    };
  },
  computed: {},
  created() {
    this.getCategories();
  },
  methods: {
    async getCategories() {
      const result = await categoryService.findAll();
      this.categories = result.data;
    },

    async saveProduct() {
      const result = await productService.create({
        name: this.name,
        price: this.price,
        status: this.status,
        categoryId: this.categoryId,
      });

      if (result.status === 201 || result.status == 200) {
        alert("Produto cadastro com sucesso");
        this.$router.push("/admin/product");
      }
    },
  },
};
</script>

<style></style>
