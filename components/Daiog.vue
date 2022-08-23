<template>
		<view class="daiog" v-show="daiogmodel">
			<view class="daiog-item" v-for="(item,index) in data" :key="index" @tap="daiogchange(item)">{{item.label}}</view>
		</view>
</template>

<script>
	export default {
		name:"Daiog",
		data() {
			return { 
			}
		},
		props:{
			data:{
				type:Array,
				default:[
					// { value:1,label:"测试1" },
					// { value:2,label:"测试2" },
					// { value:3,label:"测试3" },
					// { value:4,label:"测试4" },
					// { value:5,label:"测试5" },
				],
			},
			daiogmodel:{
				type:Boolean,
				default:false
			}
		},
		methods: {
			daiogchange(val){
				this.$emit("daiogchange",val)
			}
		}
	}
</script>

<style>
	.daiog {
		margin: 20px auto;
		min-width: 100px;
		min-height: 50px;
		border-radius: 15px;
		background-color: rgba(255,255,255,.1);
		box-shadow:  5px 5px 5px #bdbdbd,-2px -2px 10px #ffffff;
		 position: fixed;
		 top: 100px;
		 right: 50px;
		 z-index: 999999;
		 animation:daiogto 1s ease;
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
	@keyframes daiogto{
		 from {right: 0px;}
		 to {right: 50px;}
	}
</style>
