<template>
  <div>
    <h2 class="mb-2">Enviar foto do Produto</h2>
    <hr />
    <br />
    <picture-input
      ref="pictureInput"
      width="400"
      height="400"
      margin="16"
      accept="image/jpeg,image/png"
      size="10"
      button-class="btn"
      :custom-strings="{
        upload: '<h1>Bummer!</h1>',
        drag: 'Drag a 🤳 ',
        change: 'Alterar Foto',
      }"
      @change="onChange"
    >
    </picture-input>
    <v-row justify="center">
      <v-btn color="primary mt-2" @click="saveImage">Enviar</v-btn>
    </v-row>
  </div>
</template>

<script>
import PictureInput from "vue-picture-input";
import productService from "../services/product";

export default {
  name: "AdminProductFileupload",
  components: {
    PictureInput,
  },
  data() {
    return {
      image: null,
      rules: [
        (value) =>
          !value ||
          value.size < 2000000 ||
          "Avatar size should be less than 2 MB!",
      ],
      product: null,
    };
  },
  created() {
    this.getProductById();
  },
  methods: {
    async getProductById() {
      const id = this.$route.params.id;
      const result = await productService.findById(id);
      this.product = result.data;
    },
    onChange(image) {
      console.log("New picture selected!");
      if (image) {
        console.log("Picture loaded.");
        this.image = image;
      } else {
        console.log("FileReader API not supported: use the <form>, Luke!");
      }
    },
    async saveImage() {
      this.product.image = this.image;
      await productService.productUpdate(this.product);
    },
  },
};
</script>

<style></style>
