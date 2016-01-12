<?php if (!defined('THINK_PATH')) exit();?><p>

this is login page!

</p>

<form action="<?php echo U('Home/user/login');?>" method="post">
	name:		<input type="text" name="name" id="" value="" /><br />
	password:	<input type="password" name="password" id="" value="" /><br />
	<!--email:		<input type="text" name="email" id="" value="" /><br />-->
	
	<input type="submit" id="" name="" value="go" />
</form>