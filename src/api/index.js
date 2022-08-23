import Axios from 'axios'
import { Message } from 'element-ui';

const request = Axios.create({
    baseURL: 'http://jzapp.qingyunjian.cn',
    timeout: 30000
})

request.defaults.headers['Content-Type'] = 'application/json';
request.interceptors.response.use(function (response) {
    return response.data;
}, function (error) {
    if (error.response.status === 403) {
        Message({ message: '登录过期!', type: 'error', center: true, duration: 5 * 1000 });
    } else {
        Message({ message: error.response.data.message, type: 'error', center: true });
    }
    return Promise.reject(error);
});

export default request
