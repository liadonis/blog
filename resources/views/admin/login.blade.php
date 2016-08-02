<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources\views\admin\style\css\ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources\views\admin\style\font\css\font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>歡迎使用部落格管理平台</h2>
		<div class="form">
			<p style="color:red">用戶名稱錯誤</p>
			<form action="#" method="post">
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random();">
					</li>
					<li>
						<input type="submit" value="登入"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首頁</a> &copy; 2016 Powered by <a href="http://laravel.blog" target="_blank">http://laravel.blog</a></p>
		</div>
	</div>
</body>
</html>