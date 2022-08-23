<template>
	<view>
		<view class="list">
			<view class="item-list">
				<view class="item-list-title">{{data.time}} <text>{{data.type==1?"支":"收"}}</text> {{data.account}}</view>
				<view class="item-list-cont flex justify-between">
					<view class="item-list-icon flex justify-start">
					 <view class="item-list-icon-image"><image :src="data.icon"></image></view>
					 <view class="item-list-icon-title">{{data.title}}</view>
					</view>
					<view class="item-list-money">{{data.money}}</view>
				</view>
				<view class="item-list-notice">{{data.remarks}}</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				data:{}
			}
		},
		onLoad(optis) {
			this.onload(optis.id);
		},
		methods: {
			onload(id){
				this.$request.request('/api.php/Record/details',{"id":id}, "get").then(res => {
						this.data=res.data;
				}).catch(err => {})
			}
		}
	}
</script>

<style>
	/* 列表 */
	.list{
		max-height: 500px;
		overflow-y: auto;
		padding-bottom: 50px;
	}
	.item-list{
		width: 90%;
		background: #E8EEF6;
		box-shadow:  8px 8px 16px #ccd1d8,
		             -8px -8px 16px #ffffff;
		border-radius: 15px;
		margin-left: 5%;
		margin-top: 20px;
		padding: 10px;
	}
	.item-list-cont{
		line-height: 60px;
	}
	.item-list-title{
		margin-left: 10px;
		font-weight: bold;
	}
	.item-list-title text{
		display: inline-block;
		width: 20px;
		height: 20px;
		line-height: 20px;
		border-radius: 50%;
		background-color: #007AFF;
		text-align: center;
		color: #FFFFFF;
		margin-left: 10px;
		font-size: 12px;
		margin-right: 10px;
	}
	.item-list-icon{
		margin-top: 10px;
		line-height: 50px;
	}
	.item-list-icon-image{
		width: 50px;
		height: 50px;
		background:#ffffff;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.item-list-icon-image image{
		width: 40px;
		height: 40px;
	}
	.item-list-icon-title{
		margin-left: 20px;
		font-weight: bold;
	}
	.item-list-money{
		margin-right: 20px;
		font-size:18px ;
	}
	.item-list-notice{
		width: 100%;
		padding: 10px;
		margin-top: 5px;
		word-break: break-all;
	}
</style>
