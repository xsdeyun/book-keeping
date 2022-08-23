<template>
	<div>
		<div class="page-title-describe">
			<span class="page-title-describe-circle"></span><span class="page-title-describe-title">{{title}}</span>
			<p class="page-title-describe-description" v-show='description!=""'>{{description}}</p>
		</div>
	</div>
</template>

<script>
	export default {
		name:"title-describe",
		props:{
			title:{
				type:String,
				default:"标题！",
			},
			description:{
				type:String,
				default:"描述！",
			}
		}
	}
</script>

<style>
	.page-title-describe{
		min-height: 50px;
		line-height: 50px;
		padding: 0px 20px;
		background-color: white;
		border-radius: 5px;
		margin-top: 10px;
	}
	.page-title-describe-circle {
		display: inline-block;
		width: 10px;
		height: 10px;
		background: orange;
		border-radius: 50%;
		margin-right: 10px;
	}
	.page-title-describe-description{
		line-height: 14px;
		    font-size: 14px;
		    color: #909399;
		    padding-bottom: 15px;
			margin-left: 20px;
	}
</style>
