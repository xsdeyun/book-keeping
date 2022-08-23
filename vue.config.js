const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    proxy: {
        '/api': {
            target: 'http://jzapp.qingyunjian.cn',
    ws: true,
            changeOrigin: true,
    pathRewrite: { '^/api': '' },
        }
    }
},
assetsDir: 'static',
parallel: false,
publicPath: './',
})
