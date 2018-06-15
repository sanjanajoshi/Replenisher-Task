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
$dbhost= "localhost";
$dbuser= "root";
$dbpass= "sanjana";
$dbname= "walmart";
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_errno()){
	die("Database Connection failed: ". mysqli_connect_error()." (" . mysqli_connect_errno().")"	
	);
}
$query = "SELECT * from tasks where manager_id = '{$_SESSION["manager_id"]}' ORDER BY priority DESC";
$result = mysqli_query($conn, $query);
if(!$result){
	header("Location: manager.php");
}
?>

<table border = "1">
  <tr>
    <th>Task</th>
    <th>Description</th>
	<th>Assigned to</th>
	<th>Assigned At</th>
	<th>Current Status</th>
	<th>Priority</th>
	<th>Recurring</th>
	<th>Task Activity</th>
	
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)){
		$query1 = "SELECT * from task_status where task_status_task_id = '{$row["task_id"]}' and status = 'pending'  and task_status_last_recurred < NOW() ORDER BY task_status_last_recurred DESC LIMIT 1";
		$result1= mysqli_query($conn, $query1);
		if(!$result1){
			header("Location: manager.php");
		}
		$task_status = mysqli_fetch_assoc($result1);
  ?>
  <tr>
    <td><?php echo $row["task_name"]; ?></td>
    <td><?php echo $row["task_description"]; ?></td>
	<td><?php echo $row["emp_id"]; ?></td>
	<td><?php echo $task_status["task_status_last_recurred"]; ?></td>
	<td><?php echo $task_status["status"]; ?></td>
	<td><?php echo $row["priority"] == 2 ? "High" : ($row["priority"] == 1 ? "Normal" : "Low") ; ?></td>
	<td><?php echo $row["recurrence"]; ?></td>
	<td><a href = "task_activity.php?task_id=<?php echo $row["task_id"]; ?>">View Task Activity</a> 
  </tr>
  <?php } ?>
</table>

</BODY>
</HTML>