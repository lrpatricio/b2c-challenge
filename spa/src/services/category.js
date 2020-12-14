import api from "./api";

const categoryService = {
  create: (data) => {
    return api.post("admin/categories", data);
  },
  
  findAll: () => {
    return api.get("admin/categories");
  },

  findById: (id) => {
    return api.get(`admin/categories/${id}`);
  },

  categoryRemove: (id) => {
    return api.delete(`admin/categories/${id}`);
  },

  categoryUpdate: (id, data) => {
    return api.put(`admin/categories/${id}`, data);
  },
};

export default categoryService;

