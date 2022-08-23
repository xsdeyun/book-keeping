<script>
	export default {
		onLaunch() {
			const UserInfo = uni.getStorageSync('UserInfo');
			if (UserInfo == "") {
				uni.reLaunch({
					url: '/pages/login/login'
				})
			}
			uni.hideTabBar();
		},
		onShow: function() {
			console.log('App Show')
		},
		onHide: function() {
			console.log('App Hide')
		}
	}
</script>

<style>
	/*每个页面公共css */
	@import "colorui/main.css";
	@import "colorui/icon.css";
	@import "common/ron.main.css";
</style>
