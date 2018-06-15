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
session_start();
if(!ISSET($_POST["login"])){
	die("Invalid login");
}
if($_POST["username"]=="" || $_POST["password"]==""){
	header("Location: login.php");
	die("Fields cannot be left blank");
}
$query ="SELECT * ";
$query .="FROM member_login ";
$query .="WHERE USERNAME='{$_POST["username"]}' ";
$result = mysqli_query($conn,$query);


if(!$result){ 
	header("Location: login.php");
	die("Login Failed");
}
?>
<?php
$pwd=$_POST["password"];
$user_details = mysqli_fetch_assoc($result);
$password= $user_details['password'];
if($pwd===$password){ 
	$_SESSION["manager_id"] = $user_details["id"];
	header("Location: manager.php");
}else{
	header("Location: login.php");
}
?>

<?php
mysqli_free_result($result);
?>

</HTML>
<?php
mysqli_close($conn);
?>