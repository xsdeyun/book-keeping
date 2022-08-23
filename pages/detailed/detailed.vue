<template>
	<view>
		<!-- 顶部 -->
		<view class="add-top padding-sm ron-grid justify-between">
			<view class="example-body ron-col-2 justify-between">
				<view class="add-date">
					<picker mode="date" fields="month" :value="time" @change="changetime">
							<view class="uni-input">{{time}}<text class="cuIcon-triangledownfill"></text></view>
					</picker>
				</view>
			</view>
			<view class="ron-col-2 margin-top-xs flex justify-end">
				<view>
					<view class="picker cu-btn round bg-blue" @click="BranchChange">
						{{branch.label}}<text class="cuIcon-triangledownfill"></text>
					</view>
				</view>
			</view>
			<view class="out-enter flex justify-between">
				<view class="out">支出：<text>{{zhi}}</text></view>
				<view class="enter">收入：<text>{{chu}}</text></view>
			</view>
		</view>
		<!-- 列表展示 -->
		<view class="list">
			<view class="item-list" v-for="(item,index) in listdata" @click="toindex(item.id)">
				<view class="item-list-title">{{item.time}} <text>{{item.type==1?"支":"收"}}</text></view>
				<view class="item-list-cont flex justify-between">
					<view class="item-list-icon flex justify-start">
					 <view class="item-list-icon-image"><image :src="item.icon"></image></view>
					 <view class="item-list-icon-title">{{item.title}}</view>
					</view>
					<view class="item-list-money">{{item.money}}</view>
				</view>
			</view>
		</view>
	
		<!-- 选择框 -->
		<fate-Daiog :data="branch.data" :daiogmodel="daiogmodel" @daiogchange="daiogchange"></fate-Daiog>
		<!-- 底部 -->
		<tab-bar :index='2'></tab-bar>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				time: '2022-04',
				branch: {
					value: 1,
					label: "支出",
					data: [{
							value: 1,
							label: "支出"
						},
						{
							value: 2,
							label: "收入"
						},
					]
				},
				daiogmodel: false,
				listdata:[],
				zhi:0,
				chu:0,
			}
		},
		onLoad(){
			this.onload();
		},
		methods: {
			onload(){
				const UserInfo = uni.getStorageSync('UserInfo');
				let data={
					userid:UserInfo["userid"],
					time:this.time,
					type:this.branch.value
				}
				this.$request.request('/api.php/Record/list',data, "post").then(res => {
						this.listdata=res.data;
						this.zhi=res.zhi;
						this.chu=res.chu;
				}).catch(err => {})
			},
			changetime(e) {
				this.time = e.detail.value;
				this.onload();
			},
			BranchChange(e) {
				this.daiogmodel = !this.daiogmodel;
				this.data = this.branch.data;
				this.branch.index = e.detail.value;
			},
			daiogchange(val) {
				this.daiogmodel = !this.daiogmodel;
					this.branch.value = val.value;
					this.branch.label = val.label;
					this.onload();
			},
			toindex(id){
				uni.navigateTo({
					url:"/pages/bill/bill?id="+id
				})
			}
		}
	}
</script>

<style>
/* 顶部 */
	.add-top {
		width: 90%;
		background: #E8EEF6;
		box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
		border-radius: 15px;
		margin-left: 5%;
		margin-top: 20px;
	}
		/* 时间 */
	.add-date {
			background: #E8EEF6;
		    box-shadow:  3px 2px 5px #bebebe,
		                 -2px -4px 5px #ffffff;
		    border-radius: 30px;
		    min-height: 35px;
		    line-height: 35px;
		    text-align: left;
		    padding-left: 20px;
		    width: 100px;
			margin-top: 2px;
	}
	.bg-blue {
		background: #E8EEF6;
		box-shadow:  3px 2px 5px #bebebe,
		             -2px -4px 5px #ffffff;
		font-size: 12px;
		color: #000000;
	}
	.out-enter{
		padding: 5px;
		margin-top: 5px;
	}
	.enter{
		margin-left: 20px;
	}
	/* 列表 */
	.list{
		max-height: 500px;
		overflow-y: auto;
		padding-bottom: 50px;
	}
	.item-list{
		width: 90%;
		background: #E8EEF6;
		box-shadow: inset 8px 8px 16px #ccd1d8,
		            inset -5px -5px 10px #ffffff;
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
</style>
