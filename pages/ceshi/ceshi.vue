<template>
	<view>
		<view class="daiog">
			<view class="daiog-item" v-for="(item,index) in data" :key="index" @tap="itemchange(item)">{{item.label}}</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				data: [
					{ value:1,label:"测试1" },
					{ value:2,label:"测试2" },
					{ value:3,label:"测试3" },
					{ value:4,label:"测试4" },
					{ value:5,label:"测试5" },
				]
			}
		},
		methods: {
			itemchange(val){
				this.$emit("itemchange",val)
			}
		}
	}
</script>

<style>
	.daiog {
		margin: 20px auto;
		min-width: 100px;
		min-height: 50px;
		border-radius: 20px;
		background: #ffffff;
		box-shadow:  19px 19px 38px #bdbdbd,
		             -19px -19px 38px #ffffff;
		 position: absolute;
		 top: 50px;
		 left: 50px;
		 z-index: 999999;
	}
	.daiog-item{
		min-width: 80px;
		padding: 10px;
		text-align: center;
		border-bottom: 1px solid #B9B9B9;
	}
	.daiog-item:last-child{
		border: none;
	}
</style>
