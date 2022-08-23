<template>
  <div class="contanier">
  <template>
  <vue-particles
          color="#409EFF"
          :particleOpacity="0.7"
          :particlesNumber="60"
          shapeType="circle"
          :particleSize="6"
          linesColor="#409EFF"
          :linesWidth="1"
          :lineLinked="true"
          :lineOpacity="0.4"
          :linesDistance="150"
          :moveSpeed="3"
          :hoverEffect="true"
          hoverMode="grab"
          :clickEffect="true"
          clickMode="push">
</vue-particles>
  </template>
  
    <div class="login-content">
      <div class="el-form-item">
        <h2>通用后台管理系统</h2>
        <h4>后台管理系统</h4>
      </div>
      <div class="el-form-item">
        <el-input type="text" v-model='FromLogin.username' placeholder="账号" clearable />
      </div>
      <div class="el-form-item">
        <el-input type="text" v-model='FromLogin.password' placeholder="密码" clearable />
      </div>
      <!-- <div class="el-form-item">
				<el-input type="text" v-model='FromLogin.captcha' placeholder="验证码" clearable />
				<el-image style="width: 120px;padding: 0px 10px;" :src="FromLogin.url" />
			</div> -->
      <div class="el-form-item">
        <el-button type="primary" class="submit" @click='LoginSubmit()'>登录</el-button>
      </div>
    </div>
  </div>

</template>

<script>
import { setToken } from '../../utils/auth.js'
export default {
  created() {

  },
  data() {
    return {
      FromLogin: {
        username: null,
        password: null,
        captcha: null,
        captchaUrl: null
      }
    }
  },
  mounted() {

  },
  methods: {
    LoginSubmit() {
      // setToken("LoginUser",Date.parse(new Date()));
      // this.$router.push({path:'/'})
      this.$request.LoginInto(this.FromLogin).then(res => {
           if(res.code==200){
          setToken("LoginUser", Date.parse(new Date()));
          this.$router.push({ path: '/' })
        }else{
          this.$message.error(res.msg);
        }
      }).catch({})
    }
  }
}
</script>

<style>
@import url("../../assets/login.css");
#particles-js {
  width: 100%;
  height: calc(100% - 100px);
  position: absolute;
}
</style>
