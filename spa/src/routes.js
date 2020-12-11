import HomeComponent from './components/HomeComponent.vue';
import CategoryComponent from './components/CategoryComponent.vue';
import ProductComponent from './components/ProductComponent.vue';
import NotFindComponent from './components/NotFindComponent.vue';

import AdminCategoryComponent from './components/AdminCategoryComponent.vue';
import AdminCategoryComponentCreate from './components/AdminCategoryComponentCreate.vue';
import AdminCategoryComponentEdit from './components/AdminCategoryComponentEdit.vue';
import AdminComponent from './components/AdminComponent.vue';

export default [
    {path: '/', component: HomeComponent, name:'home'},
    {path: '/product', component: ProductComponent, name: 'product'},
    {path: '/category', component: CategoryComponent, name: 'category'},
    {path:'*', component: NotFindComponent, name:'404'},
    
    { path: '/admin', component: AdminComponent,
      children: [
        {
          path: 'category',
          component: AdminCategoryComponent
        },
        {
          path: 'category/novo',
          component: AdminCategoryComponentCreate
        },
        {
          path: 'category/editar/:id',
          props: true,
          component: AdminCategoryComponentEdit
        },
      ]
    }
]

