<template>
	<view>
		<view class="actrve flex justify-between">
			<view class="actrve-img">
				<image src="/static/images/logo.ico"></image>
			</view>
			<view class="actrve-cont">
				<view class="actrve-cont-title">轻云间工作室</view>
				<view class="actrve-cont-notice">世上所有的牛逼背后，都是一帮玩命的人。</view>
			</view>
		</view>
		<view class="number-list padding flex text-center text-grey  shadow-warp" >
			<view class="flex flex-sub flex-direction solid-right">
				<view class="text-xxl text-orange">16.7w</view>
				<view class="margin-top-sm">
					<text class="cuIcon-profile"></text>View
				</view>
		 </view>
			<view class="flex flex-sub flex-direction solid-right">
				<view class="text-xxl text-blue">1.1W</view>
				<view class="margin-top-sm">
					<text class="cuIcon-vip"></text> Start
				</view>
			</view>
			<view class="flex flex-sub flex-direction">
				<view class="text-xxl text-green">2.1k</view>
				<view class="margin-top-sm">
					<text class="cuIcon-fork"></text> Fork
				</view>
			</view>
		</view>
		<view class="cu-list menu card-menu margin-top-xl margin-bottom-xl shadow-lg radius">
			<view class="cu-item arrow">
				<navigator class="content " url="/pages/my/my-info/my-info" hover-class="none">
					<text class="cuIcon-profile text-grey"></text>
					<text class="text-grey">个人资料</text>
				</navigator>
			</view>
			<view class="cu-item arrow">
				<navigator class="content" url="/pages/startUp/startUp" hover-class="none">
					<text class="cuIcon-creativefill text-orange"></text>
					<text class="text-grey">其他信息</text>
				</navigator>
			</view>
			<view class="cu-item arrow">
				<navigator class="content" url="/pages/my/my-edition/my-edition" hover-class="none">
					<text class="cuIcon-formfill text-green"></text>
					<text class="text-grey">版本信息</text>
				</navigator>
			</view>
		</view>
		<view class="cu-tabbar-height"></view>
		<tab-bar :index='4'></tab-bar>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		onLoad() {},
		methods: {
		}
	}
</script>

<style>
	.actrve{
		width: 90%;
		margin: 30px auto;
		margin-bottom: 50px;
	}
	.actrve-img{
		width: 70px;
		height: 70px;
		background:#ffffff;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;	
	}
	.actrve-img image{
		width: 60px;
		height: 60px;
		border-radius: 50%;
	}
	.actrve-cont{
		width: 60%;
		margin-top: 10px;
		margin-right: 20px;
		text-align: right;
	}
	.actrve-cont-title{
		font-size: 18px;
		font-weight: bold;
	}
	.actrve-cont-notice{
		font-size: 12px;
		margin-top: 10px;
		letter-spacing: 3px;
	}
	/*  */
	.number-list{
		width: 90%;
		background: #E8EEF6;
		box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
		border-radius: 15px;
		margin-left: 5%;
		margin-top: 20px;
	}
	.cu-list{
		width: 90%;
		background: #E8EEF6;
		box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
	}
	.cu-item{
		background-color: #E8EEF6 !important;
	}
</style>
