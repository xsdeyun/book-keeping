<script>
	export default {
		name: "fate-menu",
		props: { 
		isCollapse: {
            type: Boolean,
            default: false
        },
        notitle: {
            type: Boolean,
            default: false
        },
        menudata: {
            type: Array,
            default: () => []
        },
        mode: {
            type: String,
            default: 'vertical'
        },
		},
		data() {
			return {

			}
		},
		render(h) {
			const menuItem=(item)=>{
				if((item.children&& item.children.find((children) => children.display)) || (item&& item.type === 0)){
					const sub = [h('template', { slot: 'title' },
				    [
				        h('i', { class: item && item.icon ? item.icon : 'el-icon-menu' }),
				        h('span', item ? item.title : item.name)
				    ]
				)];
				if(item.children && Array.isArray(item.children)){
					for (const i of item.children) {
					    if (i.display) {
					       sub.push(menuItem(i))
					    }
					}
				}
				return h('el-submenu',{ props: { index: item.path } }, sub)
				}else{
					return h('el-menu-item', { props: { index: item.path } }, [
					    h('i', { class: item && item.icon ? item.icon : 'el-icon-menu' }),
					    h('span', item ? item.title : item.name)
					])
				}
			}
			const subMenu = []
			if (this.menudata) {
			    for (const i of this.menudata) {
			        if (i.display) {
			            subMenu.push(menuItem(i))
			        }
			    }
			}
			return h('el-menu',{ props: { mode: this.mode,'default-active': this.activeIndex, collapse: this.isCollapse, router: true, 'unique-opened': true } },subMenu)
		}
	}
</script>

<style>
</style>
