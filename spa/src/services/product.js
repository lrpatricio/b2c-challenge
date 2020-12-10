import api from "./api";

const productService = {
  create: (data) => {
    return api.post("products", data);
  },
  findAll: () => {
    return api.get("products");
  },

  findById: (id) => {
    return api.get("products", id);
  },

  productRemove: (id) => {
    return api.delete("products", id);
  },

  productUpdate: (id) => {
    return api.put("products", id);
  },
};

export default productService;
