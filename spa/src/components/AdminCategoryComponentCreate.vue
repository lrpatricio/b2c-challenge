<template>
  <div>
    <v-container>
        <v-btn color="primary" to="/admin/category">Categorias</v-btn>
    </v-container>

      <v-form
      ref="form"
      v-model="valid"
      lazy-validation
    >
      <v-text-field
        v-model="name"
        label="Nome para o produto"
        required
      >
      </v-text-field>

       <v-select
        v-model="status"
        :items="statusData"
        :item-value="statusData.value"
        :rules="[(v) => !!v || 'Item is required']"
        label="Ativado/Desativado"
        required
      ></v-select>

       <v-select
        v-model="color"
        :items="statusColors"
        :rules="[v => !!v || 'Item is required']"
        label="Escolha a cor do seu produto"
        required
      ></v-select>

      

      <v-btn
        color="error"
        class="mr-4"
        @click="saveCategory"
      >
        Salvar
      </v-btn>

    </v-form>

  </div>
</template>

<script>
import adminCategory from '../services/category';
export default {
  data() {
    return {
        name: '',
        status: '',
        color: '',
        statusData : [{value: 1, text: "Ativo"}, { value: 0, text: "Desativo"}],
         statusColors : [
          "Amarelo", "Preto", "Vermelho", "Branco"
        ],
        valid:true
    }
  },

  created() {
     this.getCategory();
  },

  methods:{
    getCategory() {
      adminCategory.findAll().then(result => {
       this.categories = result.data;
     });
    },
    async categoryRemove(category) {
      const confirm = window.confirm(`Deseja excluir ${category.name}`);
      if(confirm) {
          await adminCategory.categoryRemove(category.id);
          this.getCategory();
      }
    },
    async saveCategory() {
      const result = await adminCategory.create({
        name: this.name,
        status: this.status,
        color: this.color
      });
      if (result.status === 201 || result.status == 200) {
        alert("Categoria cadastrada com sucesso");
        this.$router.push("/admin/category");
      }
    }
  },

}
</script>

<style>

</style>