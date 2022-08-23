<?php /*a:1:{s:70:"/www/wwwroot/yunjian.qingyunjian.cn/app/install/views/index/index.html";i:1649752344;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width,initial-scale=1.0" name="viewport">
		<title>程序安装--引导页</title>
		<style>
			body {
				background-color: #F6F7F9;
			}

			#content {
				padding: 15px 50px;
			}

			.text-center {
				text-align: center;
			}

			.text-muted {
				color: #6c757d !important;
				font-size: 1rem !important;
				font-weight: 500 !important;
			}

			.block-content {
				box-sizing: border-box;
				width: 800px;
				margin: 0 auto;
				padding: 1.625rem 1.625rem 1px;
				overflow-x: visible;
				border-radius: .875rem 1rem;
				background-color: white;
				padding: 10px 50px;

			}

			.content-heading {
				padding-bottom: 0.5rem;
				border-bottom: 1px solid #e4e7ed;
			}

			.items-push {
				display: flex;
				justify-content: space-between;
			}

			.items-notic {
				width: 40%;
			}

			.items-content {
				width: 50%;
			}

			.mb-4 {
				margin-bottom: 1.5rem !important;
			}

			.form-label {
				box-sizing: border-box;
				display: inline-block;
				margin-bottom: .375rem;
				font-weight: 500;
			}

			.form-input {
				box-sizing: border-box;
				margin: 0;
				display: block;
				width: 100%;
				font-weight: 400;
				line-height: 1.5;
				color: #3e444a;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #d8dde5;
				appearance: none;
				transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
				padding: .5rem 1rem;
				font-size: 1rem;
				border-radius: .3rem;
				font-family: Poppins, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			}

			.btn-fun {
				box-sizing: border-box;
				width: 800px;
				margin: 0 auto;
				overflow-x: visible;
				background-color: white;
				padding: 20px;
				margin-top: 20px;
				text-align: right;
				border-radius: 5px;
			}

			.btn-fun button {
				color: #fff;
				background-color: #0d6efd;
				border-color: #0d6efd;
				cursor: pointer;
				font-weight: 500;
				line-height: 1.5;
				text-align: center;
				font-size: 1rem;
				padding: 0.375rem 0.75rem;
				border-radius: 0.25rem;
			}

			.dnone {
				display: none;
			}

			/* 弹窗 */
			.popup {
				width: 100%;
				text-align: center;
				position: fixed;
				z-index: 9999;
			}

			.popup-cont {
				display: flex;
				justify-content: center;
				animation: popup 1.5s forwards;
			}

			.popup-cont p {
				width: 300px;
				height: 50px;
				line-height: 50px;
				background-color: #1989fa;
				border-color: #1989fa;
				border-radius: 5px;
				font-weight: bold;
				color: white;
			}

			@keyframes popup {
				from {
					margin-top: -10%;
				}

				to {
					margin-top: 15%;
				}
			}
			@media screen and (max-width: 1000px){
				.block-content{
					width: 500px;
				}
				.btn-fun{
					width: 500px;
				}
			}
		</style>
	</head>
	<body>
		<div class="popup dnone">
			<div class="popup-cont">
				<p class="popup-text">默认值！</p>
			</div>
		</div>
		<div id="content">
			<div class="text-center" style="margin-bottom: 10px;">
				<h1 class="h3 fw-bold mt-5 mb-2">欢迎来到 thinkphp程序 安装界面</h1>
				<h2 class="text-muted">让我们开始吧，这只需要几秒钟的时间</h2>
			</div>
			<form id="install-form" onsubmit="return false;">
				<div class="block-content" id="block1">
					<h2 class="content-heading">数据库配置</h2>
					<div class="items-push">
						<div class="items-notic">
							<p class="text-muted">
								请正确填写数据库各项配置信息，以确保程序能够成功安装。
							</p>
						</div>
						<div class="items-content">
							<div class="mb-4">
								<label class="form-label" for="host">数据库地址</label>
								<input type="text" class="form-input" id="host" name="host"
									placeholder="请输入您的数据库地址" value="127.0.0.1">
							</div>
							<div class="mb-4">
								<label class="form-label" for="port">数据库端口</label>
								<input type="text" class="form-input" id="port" name="port"
									placeholder="请输入您的数据库端口" value="3306">
							</div>
							<div class="mb-4">
								<label class="form-label" for="dbuser">数据库用户名</label>
								<input type="text" class="form-input" id="dbuser" name="dbuser"
									placeholder="请输入您的数据库用户名">
							</div>
							<div class="mb-4">
								<label class="form-label" for="dbpass">数据库密码</label>
								<input type="password" class="form-input" id="dbpass" name="dbpass"
									placeholder="请输入您的数据库密码">
							</div>
							<div class="mb-4">
								<label class="form-label" for="dbname">数据库名称</label>
								<input type="text" class="form-input" id="dbname" name="dbname"
									placeholder="请输入您的数据库名称">
							</div>
						</div>
					</div>
				</div>
				<div class="block-content dnone" id="block2">
					<h2 class="content-heading">管理员账号设置</h2>
					<div class="items-push">
						<div class="items-notic">
							<p class="text-muted">
								请输入你的邮箱和账号密码来创建管理员账户。
							</p>
						</div>
						<div class="items-content">
							<div class="mb-4">
								<label class="form-label" for="email">邮箱</label>
								<input type="text" class="form-input" id="email" name="email">
							</div>
							<div class="mb-4">
								<label class="form-label" for="name">用户名</label>
								<input type="text" class="form-input" id="username" name="username">
							</div>
							<div class="mb-4">
								<label class="form-label" for="password">密码</label>
								<input type="text" class="form-input" id="password" name="password">
							</div>
							<div class="mb-4">
								<label class="form-label" for="qpassword">确认密码</label>
								<input type="text" class="form-input" id="qpassword" name="qpassword">
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="block-content dnone" id="block3">
				<h2 class="content-heading text-center">程序安装成功！</h2>
			</div>
			<div class="btn-fun">
				<button class="down dnone">上一步</button>
				<button class="up">下一步</button>
				<button class="submit dnone" type="submit">提交</button>
			</div>
		</div>
		<script src="http://43.136.133.115/code-pluing/jquery-3.6.0/jquery-3.6.0.min.js"></script>
		<script>
			$(".up").click(() => {
				$("#block1").hide();
				$("#block2").show();
				$(".up").hide();
				$(".down").show();
				$(".submit").show();
			});
			$(".down").click(() => {
				$("#block1").show();
				$("#block2").hide();
				$(".up").show();
				$(".down").hide();
				$(".submit").hide();
			})
			$(".submit").click(() => {
				let data = requeid();
				if (data != false) {
					$.ajax({
						type: "POST",
						data: data,
						success: function(res) {
							if(res.code==200){
								popup(res.msg)
							}else{
								popup(res.msg)
							}
							$("#block1").hide();
							$("#block2").hide();
							$("#block3").show();
							$(".btn-fun").hide();
						}
					});
				}
			})

			function requeid() {
				let data = $("#install-form").serializeArray();
				let jsondata = {};
				let flag = true;
				data.forEach((item, index) => {
					if (!item.value) {
						popup("有未填项！")
						flag = false;
					} else {
						jsondata[item.name] = item.value;
					}
				})
				if (flag) {
					if (jsondata['password'] != jsondata['qpassword']) {
						popup("两次密码不一致！")
						return flag = false;
					} else {
						return jsondata;
					}
				} else {
					return flag;
				}
			}

			function popup(text) {
				$(".popup").show();
				$(".popup-text").text(text)
				setTimeout(() => {
					$(".popup").hide();
				}, 2000)
			}
		</script>
	</body>
</html>
