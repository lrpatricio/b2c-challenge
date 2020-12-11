<template>
  <v-app id="inspire">
    <v-app-bar
      app
      color="white"
      flat
    >
      <v-container class="py-0 fill-height">
        <v-avatar
          class="mr-10"
          size="32"
        ><img src="./assets/logo.svg"/></v-avatar>

         <v-btn to="/">
          Home
        </v-btn>

        <v-btn to="/category">
          Cateoria
        </v-btn>
        
        
        <v-btn to="/admin">
          Admin
        </v-btn>
        
        <v-btn to="/admin/category">
          Cateoria
        </v-btn>
          

        <v-spacer></v-spacer>
      </v-container>
      
    </v-app-bar>

    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <div class="data-view">
                <router-view></router-view>
              </div>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import logo from './assets/logo.svg'
  export default {
    data: () => ({
      return: {
        logo:logo
      },
      links: [
        'Categorias',
        'Produtos',
      ],
    }),
  }
</script>

<style scoped>
.data-view {
  padding: 30px;
}
a { text-decoration:none;}
</style>