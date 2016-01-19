<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>


		<div class="">
			<em>商品详情</em>
			<ul>
				<li>商品名称:<?php echo ($goods_info["title"]); ?> </li>
				<li>商品价格:<?php echo ($goods_info["price"]); ?></li>
				<li>上架时间:<?php echo (date("Y-m-d H:i:s",$goods["create_time"])); ?></li>
			</ul>
		 
			<input type="button" name="" id="subtract" value="-" />	
			<input type="number" name="" id="num" value="1" />	
			<input type="button" name="" id="add" value="+" />	
			 
			<input type="button" name="" id="addToCart" value="加入购物车" />
		</div>



	</body>
</html>

<script type="text/javascript">

</script>


<script type="text/javascript">
	$(function(){
		$('#add').click(function(){
			$('#num').val(parseInt($('#num').val())+1);
		});
		$('#subtract').click(function(){
			if(parseInt($('#num').val())>1){
				$('#num').val(parseInt($('#num').val())-1);
			}
		});
	});
</script>