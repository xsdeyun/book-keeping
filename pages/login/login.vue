<template>
	<view>
		<!-- 加载 -->
		<view class="content">
			<!-- 标题 -->
			<view class="content-text">
				<view class="content-text-title">欢迎回来！</view>
				<view class="content-text-sketch">欢迎使用，登录查看更多功能吧！</view>
			</view>
			<!-- 表单 start-->
			<view class="content-from">			
				<view class="cu-form-group margin-top round">
					<text class="cuIcon-profile text-blue ron-margin-right-10"></text>
					<input placeholder="*请输入账号" v-model="InfoSubmit.username" name="username"></input>
				</view>
				<view class="cu-form-group margin-top round">
					<text class="cuIcon-attention text-blue ron-margin-right-10"></text>
					<input placeholder="*请输入密码" v-model="InfoSubmit.password" name="password"></input>
				</view>
				<view class="content-btn">
					<button class="cu-btn block bg-blue margin-tb-sm lg round" @click="regiest">注册</button>
					<button class="cu-btn block bg-blue margin-tb-sm lg round" form-type="submit" @click="submit">登录</button>
				</view>
			</view>
			<!-- 表单end -->
			<view class="login-other">
				<view class="login-other-text">----第三方账号登录----</view>
				<view class="login-other-icon">
					<text class="cuIcon-weixin text-green"></text>
					<text class="cuIcon-weibo text-orange"></text>
				</view>
			</view>
			
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
				}
			}
		},
		onLoad() {
			
		},
		methods: {
			submit(){
				this.$request.request('/api.php/index/login',this.InfoSubmit, "post").then(res => {
					if(res.code==200){
						uni.setStorageSync('UserInfo', res.data);
						uni.showToast({
						title:res.msg,
						icon:'none',
						duration: 2000,
						success() {
							uni.switchTab({
								url:'/pages/index/index'
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
			regiest(){
				uni.redirectTo({
					url:'/pages/register/register'
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
		padding: 25% 0;
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
		    height: 50px;
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
	.login-other{
		margin-top: 100rpx;
	}
	.login-other-text{
		text-align: center;
		letter-spacing: 6rpx;
		color: #B9B9B9;
	}
	.login-other-icon{
		text-align: center;
		margin-top: 40rpx;
	}
	.login-other-icon text{
		font-size: 60rpx;
		margin-right: 30rpx;
		    background: #E8EEF6;
		    box-shadow: 3px 2px 5px #bebebe, -2px -4px 5px #ffffff;
		    border-radius: 5px;
		    padding: 5px;
	}
</style>
