<?php if (!defined('THINK_PATH')) exit();?><html>
	<meta charset="UTF-8"/>
	<head>
		<title>mytp1</title>
		<script src="/thinkphp/Public/static/jquery-1.12.0.min.js" type="text/javascript"></script>
	</head>
	<body>


		<p>
		
		this is login page!
		
		</p>
		<h3 id="info"></h3>
		
		<form action="<?php echo U('Home/user/login');?>" id="login_form" method="post">
			name:		<input type="text" name="name" id="name" value="" /><br />
			password:	<input type="password" name="password" id="password" value="" /><br />
			
			<input type="button" id="login_btn" name="" value="go" />
		</form>

	</body>
</html>

<script type="text/javascript">

</script>


<script type="text/javascript">
$(function(){
	$('#login_btn').click(function(){
		var login_data = $('#login_form').serialize();
		var action = $('#login_form').attr('action');
		
		$.post(action,login_data,function(res){
			$('#info').html('');
			for(var r in res){
				$('#info').append(res[r]+'<br />');
			}
		});
	});
});
</script>