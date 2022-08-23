const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    proxy: {
        '/api': {
            target: '接口地址',
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
