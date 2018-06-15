<HTML>
<HEAD>
<TITLE>Details of the user</TITLE>
<link href="stylesheets/public.css" media="all"
rel="stylesheet" type="text/css" />
</HEAD>
<BODY>

<div id="header">
	<h1>Walmart</h>
</div>
	<div id="main">
		<div id="navigation">
		&nbsp;
		</div>
		
</BODY>



<?php
$dbhost= "localhost";
$dbuser= "root";
$dbpass= "sanjana";
$dbname= "walmart";
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_errno()){
	die("Database Connection failed: ". mysqli_connect_error()." (" . mysqli_connect_errno().")"	
	);
}
?>
<?php
if(!ISSET($_POST["submit"])){
	die("Invalid login");
}
if($_POST["fname"]=="" || $_POST["lname"]=="" || $_POST["email"]=="" || $_POST["username"]=="" || $_POST["password"]=="" || $_POST["role"]==""){
	?>	
	<a href="form.php"> Re-enter Credentials </a><br/>
	<?php
	die("Fields cannot be left blank");
}
$query ="INSERT INTO MEMBER_LOGIN (";
$query .=" first_name, last_name, email, username , password, role";
$query .=" ) VALUES ( ";
$query .=" '{$_POST["fname"]}', '{$_POST["lname"]}','{$_POST["email"]}','{$_POST["username"]}','{$_POST["password"]}','{$_POST["role"]}' ";
$query .=")";
$result = mysqli_query($conn,$query);
if($result){ header("Location: login.php"); ?>
	
<?php
	
}
else{
	?>	
	<a href="form.php"> Re-enter Credentials </a><br/>
	<?php
	die("Registration Failed, please enter values for all fields");
}
?>



</HTML>

<?php
mysqli_close($conn);
?>