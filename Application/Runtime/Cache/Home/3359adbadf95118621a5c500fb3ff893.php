<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>


		<p>
		
		this is register page!
		
		</p>
		<h3 id="info"></h3>
		
		<form action="<?php echo U('Home/user/register');?>" id="register_form" method="post">
			name:		<input type="text" name="name" id="name" value="" /><br />
			password:	<input type="password" name="password" id="password" value="" /><br />
			con_pass:	<input type="password" name="con_pass" id="" value="" /><br />
			email:		<input type="text" name="email" id="" value="" /><br />
			
			<input type="button" id="register_btn" name="" value="go" />
		</form>

	</body>
</html>

<script type="text/javascript">

</script>


<script type="text/javascript">
$(function(){
	$('#register_btn').click(function(){
		var register_data = $('#register_form').serialize();
		var action = $('#register_form').attr('action');
		
		$.post(action,register_data,function(res){
			$('#info').html('');
			for(var r in res){
				$('#info').append(res[r]+'<br />');
			}
		});
	});
});
</script>