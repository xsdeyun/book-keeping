<template>
	<view>
		<!-- footer-bar -->
		<view class="footbar">
			<view class="cu-bar tabbar">
				<view class="action" :class='index==1?"text-blue":"text-gray"'  @click="Toindex()">
					<view class="cuIcon-homefill"></view>
					首页
				</view>
				<view class="action"  :class='index==2?"text-blue":"text-gray"' @click="Todetailed()">
					<view class="cuIcon-similar"></view>
					明细
				</view>
				<view class="action text-gray add-action">
					<button class="cu-btn cuIcon-add bg-blue shadow" @click="addcate()"></button>
					记一笔
				</view>
				<view  class="action"  :class='index==3?"text-blue":"text-gray"' @click="Toreport()">
					<view class="cuIcon-cart">
					</view>
					报表
				</view>
				<view  class="action"  :class='index==4?"text-blue":"text-gray"' @click="Tomy()">
					<view class="cuIcon-my">
					</view>
					我的
				</view>
			</view>
		</view>
		<!-- footer-bar -->
	</view>
</template>

<script>
	export default {
		name:"tabbar",
		data() {
			return {
				
			};
		},
		props:{
			index:{
				type:Number,
				default:1,
			}
		},
		methods:{
			Toindex(){
				uni.switchTab({
					url: '/pages/index/index'
				})
			},
			Todetailed(){
				uni.switchTab({
					url: '/pages/detailed/detailed'
				})
			},
			Toreport(){
				uni.switchTab({
					url: '/pages/report/report'
				})
			},
			Tomy(){
				uni.switchTab({
					url: '/pages/my/my'
				})
			},
			addcate(){
				uni.navigateTo({
					url:'/pages/addcate/addcate'
				})
			}
		}
	}
</script>

<style>
	.footbar {
		width: 90%;
		position: fixed;
		bottom: 12px;
		left: 5%;
		border-radius: 15px;
			background:#E8EEF6;
			box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
	}
</style>
