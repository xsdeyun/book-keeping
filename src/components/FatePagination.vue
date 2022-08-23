<template>
    <el-pagination background :current-page="page" :page-size="pageSize" layout="total, prev, pager, next, sizes" :total="total" @size-change="sizeChange" @current-change="pageChange" />
</template>
<script>
export default {
    props: ["page", "pageSize", "total"],
    data() {
        return {
            
        }
    },
    methods: {
        pageChange(val) {
            this.$emit("change", { page: val, pageSize: this.pageSize })
        },
        sizeChange(val) {
            this.$emit("change", { page: this.page, pageSize: val })
        }
    },
}
</script>
<style>
    .el-pagination{
		padding: 20px;
		background: #fff;
		text-align: right;
		margin-top: 10px;
	}
</style>
