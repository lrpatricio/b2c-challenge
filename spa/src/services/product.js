import api from "./api";

const productService = {
  create: (data) => {
    return api.post("admin/products", data);
  },
  findAll: () => {
    return api.get("admin/products");
  },

  findById: (id) => {
    return api.get(`admin/products/${id}`);
  },

  productRemove: (id) => {
    return api.delete(`admin/products/${id}`);
  },

  productUpdate: (data) => {
    return api.put(`admin/products/${data.id}`, data);
  },
};

export default productService;
