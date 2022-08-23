import router from "../router/index.js"
import { asyncRoutes, constRouter } from '@/router'
import Cookies from 'js-cookie'

const TokenKey = 'express-demo-token'

export function getToken() {
    return Cookies.get(TokenKey)
}

export function setToken(token) {
    return Cookies.set(TokenKey, token)
}

export function removeToken() {
    return Cookies.remove(TokenKey)
}
export function getAddRouter() {
    return new Promise((resolve, reject) => {
        let obj = asyncRoutes;
        obj.forEach(item => {
            router.options.routes.unshift(item);
            router.addRoute(item);
        })
        resolve('成功')
    })
}
