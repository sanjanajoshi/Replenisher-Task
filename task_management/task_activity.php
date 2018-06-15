<?php 
	session_start();
	//echo $_SESSION["manager_id"];
?>

<HTML>
<HEAD>
<TITLE>TASK</TITLE>
<link href="stylesheets/public.css" media="all"
rel="stylesheet" type="text/css" />
</HEAD>
<BODY>

<div id="header">
	<h1>VIEW TASK</h>
	<div align ="right">
	<a href="logout.php" style="color:white"> Logout </a>
	</div>
</div>
	<div id="main">
		<div id="navigation">
		&nbsp;
		</div>


<?php
//echo $_GET["task_id"];

$dbhost= "localhost";
$dbuser= "root";
$dbpass= "sanjana";
$dbname= "walmart";
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_errno()){
	die("Database Connection failed: ". mysqli_connect_error()." (" . mysqli_connect_errno().")"	
	);
}
$query = "SELECT * from task_status where task_status_task_id = '{$_GET["task_id"]}' and task_status_last_recurred < NOW() ORDER BY task_status_last_recurred DESC";
$result = mysqli_query($conn, $query);
if(!$result){
	header("Location: manager.php");
}
?>

<h3> Pending Task Activity for Task ID - <?php echo $_GET["task_id"]; ?></h3> 

<table border = "1">
  <tr>
    
	<th>Assigned At</th>
	<th>Final Status</th>
	<th>Task Details</th>
	
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)){
		
  ?>
  <tr>
    <td><?php echo $row["task_status_last_recurred"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
	<td><a href = "task_detail.php?task_id=<?php echo $_GET["task_id"]; ?>&start_time=<?php echo $row["task_status_last_recurred"];?>">Task Details</a> 
  </tr>
  <?php } ?>
</table>

</BODY>
</HTML>