import api from "./api";

const homeService = {
  productByCategory: (categoryId) => {
    return api.get(`products/${categoryId}`);
  },
  menu: () => {
    return api.get('menu')
  }
};

export default homeService;
