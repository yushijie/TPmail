<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

		<title>mail manager</title>

		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap/css/bootstrap.min.css" />

		<script src="/Public/static/jquery-1.12.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/Public/static/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

	</head>

	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">MAIL</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo U('Admin/user/lists');?>">会员 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">商品</a></li>
						<li><a href="#">广告</a></li>
						<li><a href="#">设置</a></li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">后台管理系统</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户 <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">张三</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">退出系统</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		
			<p>top</p>
		

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					
	<ul class="list-group">
		<li class="list-group-item">
			会员管理
			<ul class="list-group">
				<li class="list-group-item">新增会员</li>
				<li class="list-group-item">会员列表</li>
			</ul>
		</li>
	</ul>

				</div>
				<div class="col-md-9">
					
	<form id="edit_form" class="form-horizontal" action="<?php echo U('Admin/user/edit');?>">
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">用户名</label>
			<div class="col-sm-10">
				<input value="<?php echo ($user_info["name"]); ?>" name="name" type="text" class="form-control" id="" placeholder="用户名">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">密码</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="" placeholder="密码">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input value="<?php echo ($user_info["email"]); ?>" name="email" type="email" class="form-control" id="" placeholder="Email">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button id="edit_btn" type="button" class="btn btn-default">确定</button>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		$(function(){
			$('#edit_btn').click(function(){
				var register_data = $('#edit_form').serialize();
				var action = $('#edit_form').attr('action');
				
				$.post(action,register_data,function(res){
					//$('#info').html('');
					for(var r in res){
						$('body').append(res[r]+'<br />');
					}
				});
			});
		});
	</script>


				</div>
				<div class="col-md-12">
					
						<p>footer</p>
					
				</div>
			</div>
		</div>

	</body>

</html>