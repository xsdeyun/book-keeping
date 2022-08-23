import request from './index'

export default {
	LoginInto(params) {
		return request({
			url: '/admin.php/Login/login',
			data: params,
			method: 'post'
		})
	},
	GetUserlist(params) {
		return request({
			url: '/admin.php/User/list',
			params: params,
			method: 'get'
		})
	},
	UpdateUser(data) {
		return request({
			url: '/admin.php/User/update',
			data: data,
			method: 'put'
		})
	},
	DeleteUser(params) {
		return request({
			url: '/admin.php/User/delete',
			params:params,
			method: 'delete'
		})
	}
}
