<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>


		<p>
			<a href="<?php echo U('Home/User/login');?>">login</a>
			<br />
			<a href="<?php echo U('Home/User/register');?>">register</a>
			<br />
			<br />
			<a href="<?php echo U('Home/Index/goodslists');?>">商品列表</a>

		</p>
<br />
<input type="button" name="" id="showcart" value="显示购物车" />


	</body>
</html>

<script type="text/javascript">
$(function(){
	$('#showcart').click(function(){
		location.href="<?php echo U('Home/Cart/showCart');?>";
	});
});
</script>