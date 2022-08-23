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
			<!-- <view class="out-enter flex justify-between">
				<view class="out">支出：<text>100</text></view>
				<view class="enter">收入：<text>200</text></view>
			</view> -->
		</view>
		<fate-Daiog :data="branch.data" :daiogmodel="daiogmodel" @daiogchange="daiogchange"></fate-Daiog>
		<!-- 图表 -->
		<view class="Chart padding-xs margin-top">
			<!-- <view  class="chart-action ron-padding-tb-30">
				<text  class="cuIcon-titles text-blue"><span></span></text>
				0-22 周二
			</view>
			<view class="list1  ron-padding-bottom-20">
				<view class="charts-box">
					<qiun-data-charts type="bubble" :echartsH5="true" :echartsApp="true" :chartData="chartData1" background="none" />
				</view>
			</view> -->
			<view  class="chart-action ron-padding-tb-30">
				<text  class="cuIcon-titles text-blue"><span></span></text>
				月消费统计报表
			</view>
			<view class="list2">
				<view class="charts-box">
					<qiun-data-charts type="ring" :echartsH5="true" :echartsApp="true" :chartData="chartData" background="none" />
				</view>
			</view>
		</view>
		
		<tab-bar :index='3'></tab-bar>
		<!-- 底部 -->
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
				chartData: {
					categories: [],
					series: [{
						data: [{
								"name": "餐饮",
								"value": 20
							},
							{
								"name": "购物",
								"value": 30
							},
							{
								"name": "旅行",
								"value": 20
							},
							{
								"name": "打车",
								"value": 18
							},
							{
								"name": "存款",
								"value": 8
							}
						]
					}]
				},
			}
		},
		onLoad() {
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
				this.$request.request('/api.php/Record/report',data, "post").then(res => {
					this.chartData.series[0].data=res.data;
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
	/* 图表 */
	.Chart{
		width: 90%;
		margin: 10px auto;
		padding-bottom: 80px;
	}
	.chart-action{
		padding-top: 15px;
		    padding-bottom: 15px;
		    background: #E8EEF6;
		    box-shadow: 3px 2px 5px #bebebe, -2px -4px 5px #ffffff;
		    font-size: 12px;
		    color: #000000;
		    border-radius: 20px;
			padding-left: 10px;
	}
	.charts-box{
		    min-width: 310px;
			height: 300px;
		    border-radius: 15px;
		    background: #E8EEF6;
		    box-shadow: inset 8px 8px 16px #ccd1d8, inset -8px -8px 16px #ffffff;
		    margin-left: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
	}
</style>
