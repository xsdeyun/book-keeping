<template>
	<view>
		<!-- 顶部 -->
		<view class="add-top padding-sm ron-grid ron-height-6 justify-between">
			<view class="example-body ron-col-2 justify-between">
					<uni-datetime-picker class="add-date" type="date" v-model="single">{{single}}<text class="cuIcon-triangledownfill"></text></uni-datetime-picker>
			</view>
			<view class="ron-col-2 margin-top-xs flex justify-end">
				<view class="ron-margin-right-20">
					<view class="picker cu-btn round bg-blue" @click="AccountChange">
						{{account.label}}<text class="cuIcon-triangledownfill"></text>
					</view>
				</view>
				<view>
					<view class="picker cu-btn round bg-blue" @click="BranchChange">
						{{branch.label}}<text class="cuIcon-triangledownfill"></text>
					</view>
					</picker>
				</view>
			</view>
		</view>
		<!-- 选择框 -->
		<fate-Daiog :data="data" :daiogmodel="daiogmodel" @daiogchange="daiogchange"></fate-Daiog>
		<!-- 图标 -->
		<view class="icon-content">
			<view class="fate-tip fate-tip-top icon" data-title="交通" :class="iconIndex==1?'icon-active':'bg-white'" @click="iconchange($event,1)">
				<image src="https://jzapp.youfanzi.cn/static/icon/traffic.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="餐饮" :class="iconIndex==2?'icon-active':'bg-white'" @click="iconchange($event,2)">
				<image src="https://jzapp.youfanzi.cn/static/icon/Restaurant.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="娱乐"  :class="iconIndex==3?'icon-active':'bg-white'" @click="iconchange($event,3)">
				<image src="https://jzapp.youfanzi.cn/static/icon/entertainment.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="健康"  :class="iconIndex==4?'icon-active':'bg-white'" @click="iconchange($event,4)">
				<image src="https://jzapp.youfanzi.cn/static/icon/healthy.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="居家"  :class="iconIndex==5?'icon-active':'bg-white'" @click="iconchange($event,5)">
				<image src="https://jzapp.youfanzi.cn/static/icon/Home.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="购物" :class="iconIndex==6?'icon-active':'bg-white'" @click="iconchange($event,6)">
				<image src="https://jzapp.youfanzi.cn/static/icon/shopping.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="文教" :class="iconIndex==7?'icon-active':'bg-white'" @click="iconchange($event,7)">
				<image src="https://jzapp.youfanzi.cn/static/icon/education.svg"></image>
			</view>
			<view class="fate-tip fate-tip-top icon" data-title="其他" :class="iconIndex==8?'icon-active':'bg-white'" @click="iconchange($event,8)">
				<image src="https://jzapp.youfanzi.cn/static/icon/other.svg"></image>
			</view>
		</view>
		<!-- 备注 -->
		<view>
			<view class="remarks">
				<view class="cu-form-group justify-start">
					<view class="title">备注:</view>
					<view>
					  <textarea :maxlength='50' v-model="description" name="description" />
					</view>
				</view>
			</view>
			<view class="amount-sub">
				<view class="cu-form-group justify-start">
					<view class="title">金额:</view>
					<view>
						<input type="text" v-model="money" />
					</view>
				</view>
			</view>
			<view class="save-sub">
				<button class="cu-btn block bg-blue margin-tb-sm lg round" form-type="submit" @click="submit">提交</button>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				single: this.getday(),
				data: [],
				iconIndex:1,
				icontitle:'',
				icon:"",
				account: {
					value: 1,
					label: "请选择账户",
					data: [{
							value: 1,
							label: "支付宝"
						},
						{
							value: 2,
							label: "微信"
						},
						{
							value: 3,
							label: "云闪付"
						}
					]
				},
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
				daioname: "account",
				daiogmodel: false,
				description:'',
				money:null,
			}
		},
		methods: {
			submit(){
				const UserInfo = uni.getStorageSync('UserInfo');
				let data={
						"userid":UserInfo['userid'],
						"username":UserInfo['username'],
						"title":this.icontitle,
					    "time": this.single,
					    "account": this.account.label,
					    "type": this.branch.value,
					    "icon": this.icon,
					    "remarks": this.description,
					    "money": this.money
				};
				this.$request.request('/api.php/Record/add',data, "post").then(res => {
						uni.showToast({
						title:res.msg,
						icon:'none',
						duration: 2000,
						});
				}).catch(err => {})
			},
			AccountChange(e) {
				this.daioname = "account";
				this.daiogmodel = !this.daiogmodel;
				this.data = this.account.data;
				this.account.index = e.detail.value;
			},
			BranchChange(e) {
				this.daioname = "branch";
				this.daiogmodel = !this.daiogmodel;
				this.data = this.branch.data;
				this.branch.index = e.detail.value;
			},
			daiogchange(val) {
				this.daiogmodel = !this.daiogmodel;
				let name = this.daioname;
				if (name == "account") {
					this.account.value = val.value;
					this.account.label = val.label;
				} else {
					this.branch.value = val.value;
					this.branch.label = val.label;
				}
			},
			iconchange(e,index){
				let data=['','traffic','Restaurant','entertainment','healthy','Home','shopping','education','other'];
				this.icon=data[index];
				this.iconIndex=index;
				console.log(e);
				this.icontitle=e.currentTarget.dataset.title;
				
			},
			getday(){
				let date = new Date();
				let year = date.getFullYear();
				let month = date.getMonth() + 1;
				let day = date.getDate();
				let time = [year, month >= 10 ? month : '0' + month, day >= 10 ? day : '0' + day].join('-');
				return time;
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
		margin-top: 50px;
	}
		/* 时间 */
	.add-date {
		/* 	background: #E8EEF6;
		    box-shadow:  3px 2px 5px #bebebe,
		                 -2px -4px 5px #ffffff;
		    border-radius: 30px;
		    height: 35px;
		    line-height: 35px;
		    text-align: left;
		    padding-left: 20px;
		    width: 120px;
			margin-top: 2px; */
	}
	.uni-date{
		    background: #E8EEF6;
		    box-shadow: 3px 2px 5px #bebebe, -2px -4px 5px #ffffff;
		    border-radius: 30px;
		    height: 35px;
		    line-height: 35px;
		    width: 120px;
		    padding-left: 15px;
			margin-top: 2px;
	}
	/* 顶部左侧两个按钮 */
	.cu-btn {
		padding: 0 10px;
	}
	.bg-blue {
		background:#E8EEF6;
		box-shadow:  3px 2px 5px #bebebe,
		             -2px -4px 5px #ffffff;
		font-size: 12px;
		color: #000000;
	}

/* 8个图标 */
	.icon-content {
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
		background: #E8EEF6;
		box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
		border-radius: 15px;
		width: 90%;
		margin-left: 5%;
		margin-top: 10%;
		padding: 15px 0px 25px 0px;
	}
	.icon {
		width: 60px;
		height: 60px;
		border-radius: 50%;
		/* 选中 lightsteelblue */
		background: #FFFFFF;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-right: 20px;
		margin-top: 15px;
		box-shadow:  3px 2px 5px #bebebe;
	}
	.icon-active{
		background-color: lightsteelblue;
	}
	.icon:nth-child(4),
	.icon:nth-child(8) {
		margin-right: 0px;
	}
	.icon image {
		width: 60%;
		height: 60%;
	}
	/* 悬浮文字框 */
	.fate-tip {
		position: relative;
		text-align: center;
	}
	
	.fate-tip::after {
		min-width: 40px;
		background-color: #333;
		border-radius: 10px;
		color: white;
		display: none;
		padding: 10px 15px;
		position: absolute;
		text-align: center;
		z-index: 999;
		letter-spacing: 5px;
	}
	
	.fate-tip::before {
		background-color: #333;
		content: ' ';
		display: none;
		position: absolute;
		width: 15px;
		height: 15px;
		z-index: 999;
	}
	
	.fate-tip:hover::after {
		display: block;
	}
	
	.fate-tip:hover::before {
		display: block;
	}
	
	.fate-tip.fate-tip-top::after {
		content:attr(data-title);
		top: 0;
		left: 50%;
		-webkit-transform: translate(-50%, calc(-100% - 10px));
		        transform: translate(-50%, calc(-100% - 10px));
	}
	
	.fate-tip.fate-tip-top::before {
		top: 0;
		left: 50%;
		-webkit-transform: translate(-50%, calc(-100% - 5px)) rotate(45deg);
		        transform: translate(-50%, calc(-100% - 5px)) rotate(45deg);
	}
	
	
	/* 备注 */
	.remarks,.save-sub{
		width: 90%;
		background:#E8EEF6;
		box-shadow:5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
		border-radius: 15px;
		margin-left: 5%;
		margin-top: 20px;
	}
	.cu-form-group {
		width: 100%;
		background: none;
	}
	.cu-form-group textarea{
		min-width: 250px;
		padding: 5px;
		border-radius: 10px;
		box-shadow: inset 20px 20px 25px #e0e0e0,
		            inset -20px -20px 25px #ffffff;
		/* box-shadow: 1px 1px 2px #fefefe,-1px -1px 2px #fefefe; */
	}
	.amount-sub{
		width: 90%;
		background: #E8EEF6;
		box-shadow: 5px 5px 13px #e2e2e2, -5px -5px 13px #fefefe;
		border-radius: 15px;
		margin-left: 5%;
		margin-top: 20px;
	}
	.amount-sub .cu-form-group input{
		width: 250px;
		height: 30px;
		border-radius: 15px;
		padding-left: 10px;
		/* background: #e0e0e0; */
		box-shadow: inset 20px 20px 25px #e0e0e0,
		            inset -20px -20px 25px #ffffff;
		/* box-shadow: 1px 1px 2px #fefefe,-1px -1px 2px #fefefe; */
	}
	
	/* 保存 提交 */
	.save-sub button{
		margin-top: 30px;
		width: 100%;
		letter-spacing: 10rpx;
		background: #E8EEF6;
		box-shadow: 3px 2px 5px #bebebe, -2px -4px 5px #ffffff;
		color: black;
	}
	.save-sub .save-sub-save{
		margin-right: 20px;
	}
	.save-sub .save-sub-submit{
		
	}
</style>
