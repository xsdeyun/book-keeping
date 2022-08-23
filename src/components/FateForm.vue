<template>
	<div class="fate-from-content">
			<el-form :model="submitForm" class="fate-form">
				<el-form-item v-for="(item,index) in form" :key="index" :label="item.label" :label-width="formLabelWidth">
					<slot :name="item.slotScope" :row="submitForm" v-if="item.slotScope"></slot>
					<el-input v-model="submitForm[item.pops]" :type="item.type"  :placeholder="item.placeholder" v-else></el-input>
				</el-form-item>
			</el-form>
			<div slot="footer" class="dialog-footer">
				<el-button @click="cancel">取 消</el-button>
				<el-button type="primary" @click="Savesubmit">确 定</el-button>
			</div>
	</div>
</template>

<script>
	export default {
		name:"fate-form",
		data(){
			return{
			// submitForm:{}
			}
		},
		props:{
			form:{
				type:Array,
				default:[],
			},
			submitForm:{
				type:Object,
				default:{}
			},
			formLabelWidth:{
				type:String,
				default:'120px'
			}
		},
		methods:{
			cancel(){
				this.$emit('cancel',"cancel")
			},
			Savesubmit(){
				this.$emit('Savesubmit',this.submitForm)
			}
		}
	}
</script>

<style>
	.dialog-footer{
		text-align: right;
	}
</style>
