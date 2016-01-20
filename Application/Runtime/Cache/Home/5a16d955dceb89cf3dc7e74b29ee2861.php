<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>



<table class="table table-striped table-hover">
	<tr>
		<th>商品id</th>
		<th>商品数量</th>
	</tr>
	<?php if(is_array($cart_goods)): foreach($cart_goods as $key=>$goods): ?><tr id="goodsid<?php echo ($goods["id"]); ?>">
			<td><a href="<?php echo U('Goods/detail',array('id'=>$goods[id]));?>"><?php echo ($goods["id"]); ?></a></td>
			<td><?php echo ($goods["num"]); ?></td>
		</tr><?php endforeach; endif; ?>
	<tfoot>
	</tfoot>
</table>

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


<script type="text/javascript">
</script>