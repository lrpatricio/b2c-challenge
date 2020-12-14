<template>
  <div>
      <h2>Atualizar produto</h2>
    <div v-if="product">
      <v-form ref="form" v-model="valid">
        <v-text-field
          v-model="product.name"
          label="Nome para o produto"
          :rules=" [v => !!v || 'Campo obrigatório']"
          required
        >
        </v-text-field>

        <v-text-field 
          v-model="product.price" 
          label="Valor do produto"
          :rules=" [v => !!v || 'Campo obrigatório']"
          >
        </v-text-field>

        <v-select
          v-model="product.status"
          :items="statusData"
          item-text="text"
          item-value="value"
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

        <v-btn color="error" class="mr-4" @click="saveProduct" :disabled="!valid">
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
      statusData: [{value: "1", text: "Ativo"}, { value: "0", text: "Desativo"}],
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
      const result = await productService.productUpdate(this.product);

      if (result.status === 201 || result.status == 200) {
        alert("Produto atualizado com sucesso");
        this.$router.push('/admin/product')
      }
    },
  },
};
</script>

<style></style>
