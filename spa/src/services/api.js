import axios from 'axios'


const api = axios.create({
  baseURL: 'http://andremart.com.br'
});

api.defaults.headers.common['Content-Type'] = 'application/json';

export default api;
