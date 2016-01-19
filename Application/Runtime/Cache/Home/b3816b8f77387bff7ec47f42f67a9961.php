<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<title></title>
	</head>

	<body>
		<table class="table table-striped table-hover">
			<tr>
				<th>id</th>
				<th>商品名称</th>
				<th>商品价格</th>
				<th>创建时间</th>
				<th>更新时间</th>
			</tr>
			<?php if(is_array($goods_list[data])): foreach($goods_list[data] as $key=>$goods): ?><tr id="goodsid<?php echo ($goods["id"]); ?>">
					<td><?php echo ($goods["id"]); ?></td>
					<td><a href="<?php echo U('Goods/detail',array('id'=>$goods[id]));?>"><?php echo ($goods["title"]); ?></a></td>
					<td><?php echo ($goods["price"]); ?></td>
					<td><?php echo (date("Y-m-d H:i:s",$goods["create_time"])); ?></td>
					<td><?php echo (date("Y-m-d H:i:s",$goods["update_time"])); ?></td>
				</tr><?php endforeach; endif; ?>
			<tfoot>
				<th><?php echo ($goods_list["page"]); ?></th>
			</tfoot>
		</table>
	</body>

</html>