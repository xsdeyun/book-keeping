import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

export const constRouter = [
  {
		path: '/login',
		component: () => import('@/views/login/login'),
		name: 'login',
	}, {
		path: '/',
		component: () => import('@/views/index'),
		name: 'index',
		redirect: '/system',
	},
	{
		path: '*',
		component: () => import('@/views/404/404'),
		name: '404',
	}
]
// 动态路由
export const asyncRoutes = [{
	path: '/system',
	component: () => import('@/views/index'),
	redirect: '/system/user',
	meta: {
		title: '系统菜单'
	},
	children: [{
			path: 'user',
			component: () => import('@/views/system/user'),
			name: 'user',
			meta: {
				title: 'user',
				roles: ['user'] //角色权限配置
			}
		},
		{
			path: '*',
			component: () => import('@/views/404/404'),
		}
	]
}]
const router = new VueRouter({
  mode: 'hash',
  base: process.env.BASE_URL,
  routes: constRouter
})

export default router
