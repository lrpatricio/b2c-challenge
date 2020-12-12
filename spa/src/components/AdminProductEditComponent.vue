<template>
  <div>
    <v-container>
      <v-btn color="primary" to="/admin/category">Categorias</v-btn>
    </v-container>

    <div v-if="product">
      <v-form ref="form" v-model="valid" lazy-validation>
        <v-text-field
          v-model="product.name"
          label="Nome para o produto"
          required
        >
        </v-text-field>

        <v-text-field v-model="product.price" label="Valor do produto" required>
        </v-text-field>

        <v-select
          v-model="product.status"
          :items="statusData"
          :rules="[(v) => !!v || 'Item is required']"
          label="Ativado/Desativado"
          required
        ></v-select>

        <v-select
          v-model="product.categoryId"
          :items="categories"
          :rules="[(v) => !!v || 'Categoria é obrigatório']"
          item-text="name"
          item-value="id"
          label="Escolha a categoria do produto"
          required
        ></v-select>

        <v-btn color="error" class="mr-4" @click="saveProduct">
          Salvar
        </v-btn>
      </v-form>
    </div>
  </div>
</template>

<script>
import categoryService from "../services/category";
import productService from "../services/product";

export default {
  name: "AdminProductEdit",
  data() {
    return {
      valid: false,
      product: null,
      statusData: ["Ativo", "Desativo"],
      categories: null,
    };
  },
  computed: {},
  created() {
    this.getCategories();
    this.getProductById();
  },
  methods: {
    async getCategories() {
      const result = await categoryService.findAll();
      this.categories = result.data;
    },
    async getProductById() {
      const id = this.$route.params.id;
      const result = await productService.findById(id);
      this.product = result.data;
    },
    async saveProduct() {
      const result = await productService.update(this.product);

      if (result.status === 201 || result.status == 200) {
        alert("Produto cadastro com sucesso");
      }
    },
  },
};
</script>

<style></style>
