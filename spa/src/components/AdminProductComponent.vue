<template>
  <div>
    <v-container>
      <v-btn color="primary" to="/admin/products/novo">Adicionar</v-btn>
    </v-container>

    <v-simple-table>
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
          <td>
            <v-btn color="primary">
              <v-icon left> mdi-pencil </v-icon>
              Editar
            </v-btn>

            |

            <v-btn color="error" @click="productRemove(product)">
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
export default {
  name: "AdminProducts",
  data() {
    return {
      products
    }
  },
  created() {},
  methods: {
    getProducts() {

    },
    productRemote(product) {}
  }
};
</script>

<style></style>
