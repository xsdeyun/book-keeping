<script>
export default {
    props: ["loading", "data", "dataprops"],
    data() {
        return {
            
        }
    },
    render(h) {

        var elItems = this.dataprops.map((item) => {
            
            if (item.slotScope) {
                return h("el-table-column", { props: {
                        "show-overflow-tooltip": true,
                        "label": item.label,
                        "width": item.width,
                        "align": item.align || 'center',
                    },
                    scopedSlots: {
                        default: (props) => {
                            return this.$scopedSlots[item.slotScope](props)
                        }
                    }
                })
            } else {
                return h("el-table-column", { props: {
                        "show-overflow-tooltip": true,
                        type: item.type,
                        width: item.width,
                        prop: item.prop,
                        label: item.label,
                        align: item.align || 'center'
                    }
                })
            }
        })
        return h("el-table", { props: { data: this.data } }, elItems)
    },
}
</script>
<style>
    .el-table{
		margin-top: 10px;
	}
</style>