import router from './index.js'
import {getToken,getAddRouter} from '../utils/auth.js'

const whiteList = ['/login'] //排除的路径

var first = true;

router.beforeEach(async (to, from, next) => {
	const hasToken = getToken();
	// 有令牌 表示已经登陆
	if (hasToken) {
		if (to.path === '/login') {
			// 已登录重定向到首页
			next({path: '/'});
		} else {
			if(first) {
				await getAddRouter();
				first = false;
				next({ path: to.path })
			} else {
				next()
			}			
		}
	} else {
		// 用户无令牌
		if (whiteList.indexOf(to.path) !== -1) {
			//白名单路由放过
			next();
		} else {
			// 重定向至登录页
			next(`/login?redirect=${to.path}`);
		}
	}
})
