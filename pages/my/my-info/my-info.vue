<template>
	<view>
		<!-- 头部-->
		<view class="cu-bar bg-white solid-bottom margin-top radio">
			<view class="action">
				<text class="cuIcon-title text-orange"></text>个人信息
			</view>
		</view>
		<view class="form">
			
		<form>
			<view class="cu-form-group margin-top">
				<view class="title"><text class="cuIcon-profile text-blue"></text>用户名</view>
				<view class="info">
					{{UserInfo["username"]}}
				</view>
			</view>
			<view class="cu-form-group">
				<view class="title"><text class="cuIcon-phone text-blue"></text>手机号</view>
				<view class="info">
					{{UserInfo["mobile"]}}
				</view>
			</view>
			<view class="cu-form-group">
				<view class="title"><text class="cuIcon-card text-blue"></text>邮箱</view>
				<view class="info">
					{{UserInfo["email"]}}
				</view>
			</view>
			
		</form>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
			 UserInfo:uni.getStorageSync('UserInfo')
			}
		},
		methods: {
		
		}
	}
</script>

<style>
.cu-bar{
	width: 90%;
	background: #E8EEF6;
	box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
	margin: 20px auto;
	border-radius: 10px;
}
.cu-form-group{
	background:none;
	border-radius: 10px;
}
.cu-form-group view text{
	margin-right: 15px !important;
}
.info{
	margin-right: 20px;
}
.form{
	width: 90%;
	background: #E8EEF6;
	box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
	margin: 20px auto;
	border-radius: 10px;
}
</style>
