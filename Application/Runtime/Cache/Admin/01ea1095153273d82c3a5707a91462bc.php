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
					<a class="navbar-brand" href="<?php echo U('Admin/index/index');?>">MAIL</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo U('Admin/user/lists');?>">会员 <span class="sr-only">(current)</span></a></li>
						<li><a href="<?php echo U('Admin/goods/lists');?>">商品</a></li>
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
			商品管理
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo U('Goods/lists');?>">商品列表</a></li>
				<li class="list-group-item"><a href="<?php echo U('Goods/add');?>">新增商品</a></li>
			</ul>
		</li>
	</ul>

				</div>
				<div class="col-md-9">
					
	<table class="table table-striped table-hover">
		<tr>
			<th>id</th>
			<th>商品名称</th>
			<th>商品价格</th>
			<th>创建时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($goods_list[data])): foreach($goods_list[data] as $key=>$goods): ?><tr id="goodsid<?php echo ($goods["id"]); ?>">
				<td><?php echo ($goods["id"]); ?></td>
				<td><?php echo ($goods["title"]); ?></td>
				<td><?php echo ($goods["price"]); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$goods["create_time"])); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$goods["update_time"])); ?></td>
				<td>
					<a href="<?php echo U('Admin/Goods/edit',array('id'=>$goods[id]));?>">编辑</a>
					<a class="del" href="<?php echo U('Admin/Goods/delete');?>" uid="<?php echo ($goods[id]); ?>">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tfoot>
			<th><?php echo ($goods_list["page"]); ?></th>
		</tfoot>
	</table>

	<script type="text/javascript">
		$('.del').click(function(e) {
			//alert(e.type);	//获取事件类型
			e.preventDefault();
			var con = confirm("确定要删除此条信息？");
			if (con == true) {
				var _id = $(this).attr('uid');
				var _url = $(this).attr('href');
				$.post(_url, "id="+_id, function(res) {
					for (var r in res) {
						if(r=='status' && res[r]=='1'){
							alert('delete success');
							$('#goodsid'+_id).remove();
						}
					}
				});
			} else {
			}
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