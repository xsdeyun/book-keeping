<template>
  <el-container class="all-el-container">
    <el-aside :width="isCollapse ? '65px' : '220px'" height="100vh" class="aside">
      <div class="logo-title">
        <div class="logo-title-text">{{ isCollapse ? "管" : "后台管理" }}</div>
      </div>
      <fate-menu :menudata="menudata" :isCollapse="isCollapse" :default-active="2"></fate-menu>
    </el-aside>
    <el-container>
      <el-header class="header">
        <div>
          <span @click="toggleSideBar()">
            <i :class="isCollapse ? 'el-icon-s-unfold' : 'el-icon-s-fold'"></i></span>
          <span @click="refresh"><i class="el-icon-refresh-left"></i></span>
        </div>
        <div>
          <el-dropdown @command="handleCommand">
            <span class="el-dropdown-link">
              用户中心
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item>个人中心</el-dropdown-item>
              <el-dropdown-item command="logout">退出</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </div>
      </el-header>
      <el-main>
        <router-view></router-view>
      </el-main>
    </el-container>
  </el-container>
</template>

<script>
import menu from "@/static/data/menu.json"
import { removeToken } from '../utils/auth.js'
export default {
  created() {
  },
  data() {
    return {
      isCollapse: false,
      menudata: [],
    }
  },
  mounted() {
    this.menudata = menu.menudata
  },
  methods: {
    onload() {
    },
    toggleSideBar() {
      this.isCollapse = !this.isCollapse;
    },
    refresh() {
      window.location.reload()
    },
    handleCommand(com) {
      switch (com) {
        case 'logout':
          removeToken("user");
          window.location.reload();
          break;
        default:
          break;
      }
    }
  }

}
</script>

<style>
@import url("@/assets/index.css");
</style>
