<?php /*a:1:{s:54:"/www/wwwroot/yunjian.qingyunjian.cn/views/404/404.html";i:1650338139;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>404 -- 轻云间工作室</title>
<style>
    html {
	margin: 0;
	padding: 0;
	background-color: white;
}

body,
html {
	width: 100%;
	height: 100%;
	overflow: hidden;
}

#svgContainer {
	width: 640px;
	height: 512px;
	background-color: white;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
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

<div id="svgContainer"></div>
<p  class="address"></p>
<script src="http://ceshi.youfanzi.cn/views/404/static/js/eEjVBX.js"></script>
<script src="http://ceshi.youfanzi.cn/views/404/static/js/MvBBBj.js"></script>
<script src="http://ceshi.youfanzi.cn/views/404/static/js/script.js"></script>
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