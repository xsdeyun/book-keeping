<?php /*a:1:{s:54:"/www/wwwroot/yunjian.qingyunjian.cn/views/403/403.html";i:1650338158;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>403 --轻云间工作室</title>
<style>
  body{
      background: url(views/403/img/bg.jpg);
      background-size:cover;
  }
  .content{
      margin-top: 15%;
      margin-left: 15%;
      color: white;
  }
  .title{
      font-size: 120px;
      letter-spacing: 10px;
  }
  .notice{
      margin-left: 10px;
  }
  .bq{
      margin-top: 120px;
      margin-left: 10px;
  }
  
.address {
	width: 100%;
	position: fixed;
	bottom: 10px;
	left: 0px;
	text-align: center;
   }
</style>
</head>
<body>

<div class="content">
    <div class="title">403</div>
    <p class="notice">sorry !       未登录，或没有权限访问！</p>
    <p class="bq">Copyright 2021 - 2022 轻云间工作室 .All rights reserved.</p>
    	<p style="color:#fff;" class="address"></p>
</div>
<script>
				var address = document.querySelector(".address");
				var httpRequest = new XMLHttpRequest(); 
				httpRequest.open('GET', 'http://ceshi.youfanzi.cn/get-api/ip.php', true); 
				httpRequest.send(); 
				httpRequest.onreadystatechange = function() {
					if (httpRequest.readyState == 4 && httpRequest.status == 200) {
						let res =JSON.parse(httpRequest.response);
						address.innerHTML ="来自"+res.data.country+res.data.region+res.data.city+"    IP地址："+res.data.ip;
					}
				};
			</script>
</body>
</html>