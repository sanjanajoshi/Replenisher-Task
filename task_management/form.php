<HTML>
<HEAD>
<TITLE>REGISTER</TITLE>
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


ENTER DETAILS FOR REGISTRATION<BR /><BR /><BR />
<FORM ACTION="form_processing.php" method="post">
USERNAME:<input type="text" name="username" value="" /> <br />
<br/>
PASSWORD:<input type="text" name="password" value="" /> <br /> <br/>

FIRST NAME:<input type="text" name="fname" value="" /> <br /><br/>

LAST NAME:<input type="text" name="lname" value="" /> <br /><br/>

EMAIL:<input type="text" name="email" value="" /> <br /><br/>

ROLE: <input type="radio"  
name="role" value="manager">Manager
 <input type="radio"  
name="role" value="employee">Employee
<br /><br/>

<input type="submit" name="submit" value="Submit" /> <br />
</FORM>
</BODY>



</HTML>