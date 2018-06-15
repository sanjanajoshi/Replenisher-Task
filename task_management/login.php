<?php 
	session_start();
?>
<HTML>
<HEAD>
<TITLE>WELCOME</TITLE>
<link href="stylesheets/public.css" media="all"
rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<div id="header">
	<h1>WALMART</h>
</div>
	<div id="main">
		<div id="navigation">
		&nbsp;
		</div>
		<div id="page">
			<h2>Register or Login</h2>
		</div>
<BR /><BR /><BR />
<FORM ACTION="login_processing.php" method="post">
USERNAME:<input type="text" name="username" value="" /><br />
PASSWORD:<input type="password" name="password" value="" /><br />
<br />
<input type="submit" name="login" value="Login" /><br />
</FORM>
<a href="form.php">NEW USER</a>
</BODY>



</HTML>