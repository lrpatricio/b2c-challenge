<template>
  <div>
    <h2>Gestão de Produtos</h2>
    <v-container>
      <v-row
        :justify="'end'">
        <v-col md="2">
           <v-btn color="primary" to="/admin/product/create">Adicionar</v-btn>
        </v-col>
      </v-row>
    </v-container>

    <v-simple-table v-if="products && products.length">
      <thead>
        <tr>
          <th class="text-left">#Id</th>
          <th class="text-left">Status</th>
          <th class="text-left">Nome</th>
          <th class="text-left">Preço</th>
          <th class="text-left">Categoria</th>
          <th class="text-left">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.id }}</td>
          <td>{{ product.status }}</td>
          <td>{{ product.name }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.categoryId }} </td>
          <td>

            <v-btn color="secondary" :to="`product/fileupload/${product.id}`" small >
              <v-icon> mdi-file </v-icon>
            </v-btn>

            |

            <v-btn color="primary" :to="`product/edit/${product.id}`" small>
              <v-icon> mdi-pencil </v-icon>
            </v-btn>

            |

            <v-btn color="error" @click="productRemove(product)" small>
              <v-icon> mdi-delete </v-icon>
            </v-btn>
          </td>
        </tr>
      </tbody>
    </v-simple-table>
  </div>
</template>

<script>
import productsApi from '../services/product';

export default {
  name: "AdminProducts",
  data() {
    return {
      products: []
    }
  },
  created() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      const result = await productsApi.findAll();
      this.products = result.data;
    },
     async productRemove(product) {
      const confirm = window.confirm(`Deseja excluir ${product.name}`);
      if (confirm) {
        await productsApi.productRemove(product.id);
        this.getProducts();
      }
    },
  }
};
</script>

<style></style>
