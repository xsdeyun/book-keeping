<template>
	<view>
		<!-- 加载 -->
		<view class="content">
			<!-- 标题 -->
			<view class="content-text">
				<view class="content-text-title">开始注册！</view>
				<view class="content-text-sketch">欢迎使用，注册查看更多功能吧！</view>
			</view>
			<!-- 表单 start-->
			<view class="content-from">				
				<view class="cu-form-group round">
					<text class="cuIcon-profile text-blue ron-margin-right-10"></text>
					<input placeholder="*用户名" v-model="InfoSubmit.username" name="username"></input>
				</view>
				<view class="cu-form-group round">
					<text class="cuIcon-card text-blue ron-margin-right-10"></text>
					<input placeholder="*密码" v-model="InfoSubmit.password" name="password"></input>
				</view>
				<view class="cu-form-group round">
					<text class="cuIcon-phone text-blue ron-margin-right-10"></text>
					<input placeholder="*手机号" v-model="InfoSubmit.mobile" name="mobile"></input>
				</view>
				<view class="cu-form-group round">
					<text class="cuIcon-card text-blue ron-margin-right-10"></text>
					<input placeholder="*邮箱" v-model="InfoSubmit.email" name="email"></input>
				</view>
				<view class="content-btn">
					<button class="cu-btn block bg-blue margin-tb-sm lg round" @click="login">登录</button>
					<button class="cu-btn block bg-blue margin-tb-sm lg round" form-type="submit" @click="regist()">注册</button>
				</view>
			</view>
			<!-- 表单end -->
			
		</view>
		
	</view>
</template>

<script>
	export default {
		data() {
			return {
				InfoSubmit:{
					"username":null,
					"password":null,
					"mobile":null,
					"email":null,
				}
			}
		},
		onLoad() {
			
		},
		methods: {
			regist(){
				this.$request.request('/api.php/Regist/index',this.InfoSubmit, "post").then(res => {
					console.log(res)
					if(res.code==200){
						uni.showToast({
						title:res.msg,
						icon:'none',
						duration: 2000,
						success() {
							uni.redirectTo({
								url:'/pages/login/login'
							})
						}
						});
					}else{
						uni.showToast({
						title:res.msg,
						icon:'none',
						duration: 2000
						});
					}
					
				}).catch(err => {})
			},
			login(){
				uni.redirectTo({
					url:"/pages/login/login"
				})
			}
		}
	}
</script>

<style>
	.cu-form-group{
		box-shadow: inset 2px 2px 5px #bebebe, -2px -4px 10px #ffffff;
	}
	.content{
		width: 90%;
		height: 100vh;
		margin: 0 auto;
	}
	.content-text{
		padding: 25% 0 10% 0;
	}
	.content-text-title{
		font-size: 50rpx;
		font-weight: bold;
		letter-spacing: 10rpx;
	}
	.content-text-sketch{
		margin-top: 20rpx;
		letter-spacing: 5rpx;
	}
	.content-btn{
		margin-top: 100rpx;
	}
	.content-btn button{
		width: 45%;
		float: left;
		margin-right: 5%;
		letter-spacing: 10rpx;
		background: #E8EEF6;
		box-shadow: 3px 2px 5px #bebebe, -2px -4px 5px #ffffff;
		color: black;
	}
	.cu-form-group{
		margin-top: 15rpx;
	}
</style>
