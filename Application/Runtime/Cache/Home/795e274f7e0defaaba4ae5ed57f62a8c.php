<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/thinkphp/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>


<div class="">
	<em>商品详情</em>
	<ul>
		<li>商品名称:<?php echo ($goods_info["title"]); ?> </li>
		<li>商品价格:<?php echo ($goods_info["price"]); ?></li>
		<li>上架时间:<?php echo (date("Y-m-d H:i:s",$goods["create_time"])); ?></li>
	</ul>
	<form id="addtocart_form" action="<?php echo U('Home/goods/addtocart');?>" method="post">
		<input type="hidden" name="id" id="id" value="<?php echo ($goods_info["title"]); ?>" />

		<input type="button" name="" id="subtract" value="-" />
		<input type="number" name="num" id="num" value="1" />
		<input type="button" name="" id="add" value="+" />

		<input type="button" name="" id="addToCart" value="加入购物车" />
	</form>
	<div id="info"></div>
</div>


	</body>
</html>

<script type="text/javascript">

</script>


<script type="text/javascript">
	$(function() {
		$('#add').click(function() {
			$('#num').val(parseInt($('#num').val()) + 1);
		});
		$('#subtract').click(function() {
			if (parseInt($('#num').val()) > 1) {
				$('#num').val(parseInt($('#num').val()) - 1);
			}
		});
		$('#addToCart').click(function() {
			var addtocart_data = $('#addtocart_form').serialize();
			var action = $('#addtocart_form').attr('action');
			$.post(action, addtocart_data, function(res) {
				$('#info').html('');
				for (var r in res) {
					$('#info').append(res[r] + '<br />');
				}
			});
		});
	});
</script>