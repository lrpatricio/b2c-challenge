import HomeComponent from './components/HomeComponent.vue';
import CategoryComponent from './components/CategoryComponent.vue';
import ProductComponent from './components/ProductComponent.vue';
import NotFindComponent from './components/NotFindComponent.vue';

export default [
    {path: '/', component: HomeComponent, name:'home'},
    {path: '/product', component: ProductComponent, name: 'product'},
    {path: '/category', component: CategoryComponent, name: 'category'},
    {path:'*', component: NotFindComponent, name:'404'}
]

