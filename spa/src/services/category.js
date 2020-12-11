import api from "./api";

const categoryService = {
  create: (data) => {
    return api.post("categories", data);
  },
  
  findAll: () => {
    return api.get("categories");
  },

  findById: (id) => {
    return api.get("categories", id);
  },

  categoryRemove: (id) => {
    return api.delete("categories", id);
  },

  categoryUpdate: (id) => {
    return api.put("categories", id);
  },
};

export default categoryService;
