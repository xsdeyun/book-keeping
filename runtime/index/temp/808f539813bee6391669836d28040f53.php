<?php /*a:1:{s:63:"/www/wwwroot/ceshi.youfanzi.cn/app/index/views/index/index.html";i:1650332230;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>轻云间工作室</title>
		<meta name="keywords" content="轻云间工作室" />
		<meta name="description" content="轻云间工作室" />
		<style>
			body {
				padding: 12% 5% 5% 5%;
				background-image: url(public/system/static/index/image/bg.jpeg);
			}

			.content {
				text-align: center;
				border-radius: 20px;
			}

			.acter {
				border-radius: 50%;
				max-width: 100px;
				max-height: 100px;
			}

			.address {
				width: 100%;
				position: fixed;
				bottom: 10px;
				left: 0px;
				text-align: center;
			}
			.item{
				border-radius:10px;
				padding:7px 30px;
				color:#fff;
				border-style:solid;
				text-decoration:none;
			}
		</style>
	</head>
	<body style="">
		<div class="content">
			<p>
				<img class="acter" src="/public/system/static/index/image/acter.jpg">
			</p>
			<h1 style="color:#fff;"><strong>轻云间工作室</strong>
			</h1>
			<p style="font-size:3vh;color:#fff;">也许，只有真正动心了,才会为他所做的一件小事,在旁人看来无所谓,而在她看来却是心碎。</p>
			<p style="line-height:3;">
				<a class="item" href="javascript:;">首页</a>
				<a class="item" href="javascript:;">寄语</a>
				<a class="item" href="javascript:;">QQ</a>
				<a class="item" href="javascript:;">主页</a>
			</p>
			<p style="color:#fff;" class="address"></p>
			<script type="text/javascript" color="255,255,255" opacity='0.7' zIndex="-2" count="200"
				src="style/js/canvas-nest.min.js"></script>
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