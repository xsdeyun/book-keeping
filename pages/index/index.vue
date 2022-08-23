<template>
	<view class="contnet-page ">
		<view class="top-cont">
			<view class="info">
				<text>轻云间工作室</text>
			</view>
			<view class="actver">
				<image src="/static/images/logo.ico">
				</image>
			</view>
		</view>
		<!-- 统计 -->
		<view class="cont">
			<view class="cont1">
				<view class="weather">
					<view class="time">{{date.hours}}</view>
					<view class="year">{{date.years}}</view>
					<view class="week">{{date.week}}</view>
					<view class="address">地点：{{weather.city}}</view>
					<view class="shes">℃：{{weather.detail.low}} ~ {{weather.detail.high}}</view>
					<view class="qix">气象：{{weather.detail.text_day}} ~ {{weather.detail.text_night}}</view>
				</view>
				<view class="count-echart">
					<view class="title">每日精句</view>
					<view>
						{{juzi}}
					</view>
				</view>
			</view>
			<view class="cont2">
				<view class="account-count">
					<view class="title">消费统计<text class="cuIcon-tagfill ron-float-right"></text></view>
					<view class="count-day">今日消费：<text>{{consumption.day}}</text></view>
					<view class="count-day">本周消费：<text>{{consumption.week}}</text></view>
					<view class="count-day">本月消费：<text>{{consumption.month}}</text></view>
					<view class="count-day">本年消费：<text>{{consumption.year}}</text></view>
				</view>
				<view class="near-cons">
					<view class="title">近期消费<text class="cuIcon-newsfill ron-float-right"></text></view>
					<view class="item-near" v-for="(item,index) in listdata" :key="index" @click="toindex(item.id)">{{index+1}}. {{item.title}} {{item.money}} <text class="cuIcon-right"></text></view>
				</view>
			</view>
		</view>
		<view class="music flex justify-start">
			<view class="music-img">
				<image :src="music.picUrl"></image>
				<view class="zb">
					<image v-if="musicindex==1" src="../../static/icon/bo.png" @tap="musicstart()"></image>
					<image v-else src="../../static/icon/zan.png" @tap="musicstart()"></image>
				</view>
			</view>
			<view class="music-title">
				<view>{{music.name}}</view>
				<view>{{music.auther}}</view>
			</view>
		</view>

		<tab-bar></tab-bar>

	</view>
</template>

<script>
	export default {
		data() {
			return {
				consumption:{
					day:1,
					week:1,
					month:1,
					year:1,
				},
				juzi:"在我背后，微笑地活下去吧",
				weather:{
					city:'',
					detail:{
						low:"",
						high:"",
						text_day:"",
						text_night:""
					}
				},
				innerAudioContext:uni.createInnerAudioContext(),
				music:{
					picUrl:"https://p3.music.126.net/8o8Sa7kddNh97oZwe9rQNA==/109951166531819588.jpg?param=300y300",
					name:"妈妈的话",
					auther:"anxy",
					mp3Url:"http://img.youfanzi.cn/tu1/toimg/MnKZ7OASziobj_wo3DlMOGwrbDjj7DisKw_14251319943_b751_29e9_7662_1751af1b88f1eaad9f096ed15d957fee.mp3"
				},
				musicindex:1,
				date:{
					hours:"",
					years:"",
					week:"",
				},
				listdata:[]
			}
		},
		async mounted() {
		    await this.getlist();
			await this.getindex();
			this.getdate();
		},
		methods: {
		  getlist(){
			  const UserInfo = uni.getStorageSync('UserInfo');
			  this.$request.request('/api.php/Record/index',{userid:UserInfo['userid']}, "post").then(res => {
				  this.consumption=res.data;
				  this.listdata=res.list;
			  }).catch(err => {})
		  },
		  getindex(){
		  		this.$request.request('/api.php/index/home','', "get").then(res => {
					this.weather=res.weather;
		  		}).catch(err => {})
		  },
		  musicstart(){
			  const innerAudioContext =this.innerAudioContext;
			  if(this.musicindex==1){
				  innerAudioContext.autoplay = true;
				  innerAudioContext.src = this.music.mp3Url;
				  innerAudioContext.onPlay(() => {
				    this.musicindex=2;
				  });
				  innerAudioContext.onError((res) => {
				    console.log(res.errMsg);
				    console.log(res.errCode);
				  });
			  }else{
				  innerAudioContext.pause();
				  this.musicindex=1;
			  }
			  
		  },
		  toindex(id){
		  	uni.navigateTo({
		  		url:"/pages/bill/bill?id="+id
		  	})
		  },
		  getdate(){
			  setInterval(()=>{
			  	let date=new Date();
			  	let year=date.getFullYear();
			  	let month=date.getMonth()+1;
			  	    month< 10 ?month="0"+month:month;
			  	let day=date.getDate();
			  	day< 10 ?day="0"+day:day;
			  	let hour=date.getHours();
			  	hour< 10 ?hour="0"+hour:hour;
			  	let Minute=date.getMinutes();
			  	Minute< 10 ?Minute="0"+Minute:Minute;
			  	let week=date.getDay();
			  	let weeks=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
			  	let years=year+"年"+month+"月"+day+"日";
			  	let hours=hour+":"+Minute;
			  	let weekd=weeks[week];
				this.date.years=years;
				this.date.hours=hours;
				this.date.week=weekd;
			  },1000)
		  }
		}
	}
</script>

<style>
	.contnet-page {
		padding: 20px 0px;
		position: relative;
	}

	.contnet-page::before {
		position: absolute;
		content: "";
		width: 100%;
		height: 100%;
		top: 0px;
		left: 0px;
		/* background-size: cover;
		box-shadow: inset 1px 1px 1px 1px #00000017, inset -1px -1px 1px 1px #00000017;
		filter: blur(10px); */
		z-index: -1;
	}

	/* 顶部 */
	.top-cont {
		display: flex;
		justify-content: space-between;
	}

	.info {
		min-width: 30%;
		height: 40px;
		margin-left: 5%;
		padding: 10px;
		text-align: center;
		font-size: 16px;
		letter-spacing: 5px;
		border-radius: 20px;
		background: #E8EEF6;
		color: #8aa5e6;
		box-shadow: 2px 3px 2px #bebebe,
			-3px -5px 8px #ffffff;
		font-weight: bold;
	}

	.actver {
		width: 60px;
		height: 60px;
		border-radius: 50%;
		margin-right: 5%;
		background: linear-gradient(145deg, #f0f0f0, #ffffff);
		padding: 5px;
		margin-top: -10px;
	}

	.actver image {
		width: 100%;
		height: 100%;
		border-radius: 50%;
	}

	.cont {
		display: flex;
		justify-content: space-between;
	}

	.cont1 {
		width: 43%;
		margin-left: 2%;
	}

	.cont2 {
		width: 43%;
		margin-right: 7%;
	}

	/* 图表 */
	.count-echart {
		margin-top: 30px;
		padding: 15px;
		min-height: 170px;
		width: 100%;
		line-height: 30px;
		margin-left: 5%;
		border-radius: 10px;
		background: #E8EEF6;
		box-shadow: 8px 8px 16px #c5cad1,
			-8px -8px 10px #ffffff;
	}
	.count-echart .title{
		font-weight: bold;
	}
	/* 天气 */
	.weather {
		margin-top: 30px;
		padding: 15px;
		min-height: 100px;
		width: 100%;
		line-height: 30px;
		margin-left: 5%;
		border-radius: 10px;
		background: #E8EEF6;
		box-shadow: 8px 8px 16px #c5cad1,
			-8px -8px 10px #ffffff;
	}

	.weather .time {
		font-weight: bold;
		font-size: 40px;
		color: white;
	}

	.weather .year {
		font-size: 12px;
		font-weight: bold;
	}

	.weather .week {
		padding: 5px;
		background: #E8EEF6;
		box-shadow: 2px 3px 2px #c5cad1,
			-2px -2px 2px #ffffff;
		border-radius: 30px;
		text-align: center;
	}

	.weather .address {
		margin-top: 10px;
	}

	/* 统计 */
	.account-count {
		margin-top: 30px;
		padding: 10px;
		width: 100%;
		margin-left: 5%;
		border-radius: 20px;
		color: #7195e7;
		background: #E8EEF6;
		/* background:linear-gradient(145deg, #E8EEF6, #f0f0f0); */
		box-shadow: 5px 5px 10px #FFFFFF,
			-5px -5px 10px #ffffff;
		line-height: 25px;
	}

	.account-count text {
		font-weight: bold;
	}

	.account-count .title,.near-cons .title{
		font-weight: bold;
	}
	.near-cons{
		margin-top: 20px;
		padding: 10px;
		width: 100%;
		min-height: 250px;
		margin-left: 5%;
		border-radius: 20px;
		color: #7195e7;
		background: #E8EEF6;
		/* background:linear-gradient(145deg, #E8EEF6, #f0f0f0); */
		box-shadow: 5px 5px 10px #FFFFFF,
			-5px -5px 10px #ffffff;
		line-height: 20px;
	}
	.near-cons .cuIcon-right{
		float: right;
	}
	.item-near{
		padding: 5px;
		background: #E8EEF6;
		box-shadow: 2px 3px 2px #c5cad1,
			-2px -2px 2px #ffffff;
		border-radius: 30px;
		/* text-align: center; */
		margin-top: 8px;
	}
	/* 音乐 */
	.music{
		width: 80%;
		min-height: 80px;
		margin: 30px auto;
		border-radius: 10px;
		background:rgba(255,255,255,0.5);
		box-shadow:  20px 20px 20px #c5cad1,
		             -10px -10px 10px #ffffff;
					 margin-bottom: 100px;
	}
	.music-img{
		width: 30%;
		height: 80px;
		border-radius: 50%;
		position: relative;
	}
	.music-img image{
		width: 70px;
		height: 70px;
		border-radius: 50%;
		margin-top: 5px;
		margin-left: 20px;
	}
	.music-title{
		padding-top: 10px;
		margin-left: 30px;
		line-height: 30px;
	}
	.zb{
		width: 40px;
		height: 40px;
		position: absolute;
		top: 15px;
		left: 15px;
	}
	.zb image{
		width: 100%;
		height: 100%;
	}
</style>
