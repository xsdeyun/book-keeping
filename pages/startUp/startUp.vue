<template>
	<view style="height: 100vh;" @touchstart="ListTouchStart" @touchmove="ListTouchMove" @touchend="ListTouchEnd">
		<view>
			<view class="flex align-center flex-direction">
				<image class="start-logo" :src="startimg[SWindex]"></image>
				<view class="start-introduce">
					<view class="start-introduce-title">企业助手</view>
					<view class="start-introduce-span">{{sketch[SWindex]}}</view>
				</view> 
			</view>
		</view> 
		<view class="swiper">
			<label class="list-bt " :class="SWindex==0?'bg-e8':'bg-grey'" ></label>
			<label class="list-bt "  :class="SWindex==1?'bg-e8':'bg-grey'" ></label>
			<label class="list-bt " :class="SWindex==2?'bg-e8':'bg-grey'" ></label>
		</view>
		<view class="flex justify-center">
			<button class="jinru cu-btn block bg-blue margin-tb-sm xl round ron-width-b2" @click="getinto()">进入！</button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				listTouchStart:null,
				listTouchDirection:null,
				SWindex:0,
				sketch:['秘书，管家，快速了解项目进展','严格印章管理，简化签字流程','一键GET使用权限，一键审批'],
				startimg:['../../static/images/Startup1.svg','../../static/images/Startup2.svg','../../static/images/Startup3.svg']
			}
		},
		onLoad() {
			this.onload();
		},
		methods: {
			onload(){
				
			},
			
			
			// ListTouch触摸开始
			ListTouchStart(e) {
				this.listTouchStart=e.touches[0].pageX;
			},
			
			// ListTouch计算方向
			ListTouchMove(e) {
				if(e.touches[0].pageX - (this.listTouchStart -100) < 0 ){
					this.listTouchDirection="left";
				}else if(e.touches[0].pageX - this.listTouchStart > 100 ){
					this.listTouchDirection="right";
				}
			},
			// ListTouch计算滚动
			ListTouchEnd(e) {
				if (this.listTouchDirection == 'left') {
					if(this.SWindex==2){
						this.SWindex=2;
					}else{
						this.SWindex++;
					}
				} else {
					if(this.SWindex==0){
						this.SWindex=0;
					}else{
						this.SWindex--;
					}
				}
			},
			getinto(){
				uni.switchTab({
					url:'/pages/index/index'
				})
			}
		}

	}
</script>

<style>

	.start-logo {
		width: 100%;
		height: 800rpx;
	}

	.start-introduce {
		text-align: center;
	}

	.start-introduce-title {
		font-size: 40rpx;
		font-weight: bold;
		letter-spacing: 10rpx;
	}

	.start-introduce-span {
		font-size: 30rpx;
		margin-top: 40rpx;
	}
	.swiper{
		    justify-content: center;
		    display: flex;
		    padding: 50px 40px;
	}
	.bg-e8{
		background: #E8EEF6;
	}
	.list-bt{
		width: 30px;
		    height: 10px;
		    border-radius: 25px;
		    margin-right: 10px;
			box-shadow:  3px 2px 5px #bebebe,
			             -2px -4px 5px #ffffff;
						color: #000000;
	}
	.jinru{
		background: #E8EEF6;
		box-shadow:  3px 2px 5px #bebebe,
		             -2px -4px 5px #ffffff;
					color: #000000;
	}
</style>
