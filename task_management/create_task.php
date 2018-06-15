<?php 
	session_start();
?>

<HTML>
<HEAD>
<TITLE>TASK</TITLE>
<link href="stylesheets/public.css" media="all"
rel="stylesheet" type="text/css" />
</HEAD>
<BODY>

<div id="header">
	<h1>CREATE TASK</h>
	<div align ="right">
	<a href="logout.php" style="color:white"> Logout </a>
	</div>
</div>
	<div id="main">
		<div id="navigation">
		&nbsp;
		</div>


<FORM ACTION="create_processing.php" method="post">
Task Name:<input type="text" name="task_name" value="" /> <br /><br/>
Task Description:<input type="text" name="task_description" value="" /> <br /> <br/>
Recurrence:<input type="radio"  
name="recurrence" value="hourly">Hourly
 <input type="radio"  
name="recurrence" value="daily">Daily
 <input type="radio"  
name="recurrence" value="once">Once<br /><br/>
Priority:<input type="radio"  
name="priority" value="0">Low
 <input type="radio"  
name="priority" value="1">Normal
 <input type="radio"  
name="priority" value="2">High<br /><br/>
Employee:<input type="text" name="username" value="" /> <br /><br/>
<input type="submit" name="submit" value="Submit" /> <br />
</FORM>
</BODY>



</HTML>