import axios from 'axios'
import https from 'https';

const api = axios.create({
  baseURL: 'http://andremart.com.br',
  httpsAgent: new https.Agent({  
    rejectUnauthorized: false
  })
});

api.defaults.headers.common['Content-Type'] = 'application/json';

export default api;
