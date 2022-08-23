<template>
  <div class="user">
    <!-- 标题 -->
    <title-describe :title='"用户管理"' :description='""'></title-describe>
    <!-- 查询 -->
    <div class="operation">
      <el-input placeholder="请输入用户名搜索" v-model="searchvalue.name" clearable suffix-icon="el-icon-search"
        class="el-input" @blur="searchdata()"></el-input>
    </div>
    <!-- 内容 -->
    <div style="background-color: white; margin-top: 15px;">
      <!-- 表格 -->
      <fate-table :data="tabledata" :dataprops="dataprops">
        <template v-slot:operation="scope">
          <el-button icon="el-icon-edit" size="mini" type="text" @click="edit(scope.row)">
            编辑
          </el-button>
          <el-popconfirm title="确定永久删除该用户吗？" style="margin-left: 10px;" @confirm="remove(scope.row)">
            <el-button slot="reference" type="text" icon="el-icon-delete" size="mini">删除</el-button>
          </el-popconfirm>
        </template>
      </fate-table>
      <!-- 弹窗 -->
      <el-dialog title="信息修改" :visible.sync="dialogVisible" width="50%" :before-close="handleClose">
        <fate-form :form="form" :submitForm="submitForm" @Savesubmit="Savesubmit" @cancel="cancel"></fate-form>
      </el-dialog>
      <!-- 分页 -->
      <div style="text-align: right; padding: 5px 0px;">
        <fate-page :page="searchParams.page" @change="pageChange" :total="searchParams.total"
          :page-size="searchParams.pageSize"></fate-page>
      </div>
    </div>
    <!-- 底部 -->
  </div>
</template>

<script>
import {
  removeToken
} from '../../utils/auth.js'
export default {
  data() {
    return {
      // 分页
      searchParams: {
        total: 10,
        page: 1,
        limit: 10,
      },
      // 提交查询
      searchvalue: {
        name: '',
        mobile: '',
        data: [],
      },
      dataprops: [{
        type: "selection",
        width: "55"
      },
      {
						label: "ID",
						prop: "id",
						width: "80"
					},
					{
						label: "用户名",
						prop: "username",
					},
					{
						label: "密码",
						prop: "password",
					},
					{
						label: "邮箱",
						prop: "email",
					},
					{
						label: "手机号",
						prop: "mobile",
					},
					{
						label: "创建时间",
						prop: "CreatTime",
					},
					{
						label: "操作",
						slotScope: "operation",
						width: "200"
					}
      ],
      tabledata: [],
      // 弹窗
      dialogVisible: false,
      // 表单组件
      submitForm: {
        	id:1,
				 	username:'',
					nickname:'',
					email:'',
					description:''
      },
      form: [
       	{label:"用户名",placeholder:"请输入...",pops:"username"},
					{label:"邮箱",placeholder:"请输入...",pops:"email"},
					{label:"手机号",placeholder:"请输入...",pops:"mobile"},
      ],
    }
  },
  created() {
    this.getdata();
  },
  methods: {
    // 初始数据加载
    getdata() {
      let data = {
        "page": this.searchParams.page,
        "limit": this.searchParams.limit
      }
      this.$request.GetUserlist(data).then(res => {
        this.tabledata = res.data;
        this.searchParams.total = res.count;
      }).catch()
    },
    // 页面查询
    pageChange(val) {
      this.searchParams.page = val.page;
      this.searchParams.limit = val.pageSize;
      this.getdata()
    },
    // 条件查询
    searchdata() {
      let data = {
        "page": this.searchParams.page,
        "limit": this.searchParams.limit,
        "username": this.searchvalue.name
      }
      this.$request.GetUserlist(data).then(res => {
        this.tabledata = res.data;
        this.searchParams.total = res.count;
      }).catch()
    },
    // 弹窗
    handleClose(done) {
      this.dialogVisible = false;
    },
    edit(val) {
      this.submitForm = val;
      this.dialogVisible = true;
    },
    Savesubmit(val) {
      this.$request.UpdateUser(val).then(res => {
        if (res.code == 200) {
          this.$message.success(res.msg);
        } else {
          this.$message.error(res.msg);
        }
      }).catch()
      this.dialogVisible = false;
    },
    remove(row) {
      this.$request.DeleteUser({ id: row.id }).then(res => {
        if (res.code == 200) {
          this.$message.success(res.msg);
        } else {
          this.$message.error(res.msg);
        }
      })
    },
    cancel() {
      this.dialogVisible = false;
    }
  }
}
</script>
<style>
.user>.operation {
  padding: 10px 10px;
  background-color: white;
  margin-top: 10px;
}

.user>.operation>.el-input {
  width: 200px;
  margin-right: 10px;
}
</style>
