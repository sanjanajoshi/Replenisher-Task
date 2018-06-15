<HTML>
<HEAD>
<TITLE>Task details</TITLE>
<link href="stylesheets/public.css" media="all"
rel="stylesheet" type="text/css" />
</HEAD>
<BODY>

<div id="header">
	<h1>Walmart</h>
	<div align ="right">
	<a href="logout.php" style="color:white"> Logout </a>
	</div>
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
$manager_id = $_SESSION["manager_id"];

?>
<?php if(!ISSET($_POST["submit"])){
	die("Invalid creation");
}
if($_POST["task_name"]=="" || $_POST["task_description"]=="" || $_POST["recurrence"]=="" || $_POST["priority"]=="" || $_POST["username"]==""){
	?>	
	<a href="create_task.php"> Fill task Details </a><br/><br/>
	
	<?php
	die("Fields cannot be left blank");
}
$query1 = "SELECT id from member_login where username = '{$_POST["username"]}'";
$res = mysqli_query($conn, $query1);
$emp_details = mysqli_fetch_assoc($res);

$timedate = date ('Y-m-d H:i:s');



$query ="INSERT INTO TASKS (";
$query .=" manager_id, task_name, task_description, recurrence, priority , emp_id, tasks_last_recurred, status";
$query .=" ) VALUES ( ";
$query .=" '{$manager_id}', '{$_POST["task_name"]}', '{$_POST["task_description"]}','{$_POST["recurrence"]}','{$_POST["priority"]}','{$emp_details["id"]}','{$timedate}','pending' ";
$query .=")";
$result = mysqli_query($conn,$query);
$task_id = mysqli_insert_id($conn);

if($result){
	//$recurring = $_POST["recurrence"];
	if($_POST["recurrence"] == 'once')
	{
		$insert_once_query = "INSERT INTO task_status (";
		$insert_once_query .=" task_status_task_id, task_status_last_recurred, status";
		$insert_once_query .=" ) VALUES ( ";
		$insert_once_query .=" '{$task_id}', '{$timedate}', 'pending' ";
		$insert_once_query .=")";
		
		$result_once = mysqli_query($conn, $insert_once_query);
		
		$insert_once_query1 = "INSERT INTO task_track (";
		$insert_once_query1 .=" task_id, task_track_last_recurred, status, change_time";
		$insert_once_query1 .=" ) VALUES ( ";
		$insert_once_query1 .=" '{$task_id}', '{$timedate}','pending', '{$timedate}' ";
		$insert_once_query1 .=")";
		
		$result_once_query1 = mysqli_query($conn, $insert_once_query1);
		if(!$result_once || !$result_once_query1){
			header("Location: login.php");
		}
	}else if($_POST["recurrence"] == 'daily'){
		$end_time = date('Y-m-d H:i:s', strtotime('+6 days', strtotime($timedate)));
		//echo $end_time;
	
	
		while(strtotime($timedate) <= strtotime($end_time)){
				
				$insert_daily_query = "INSERT INTO task_status (";
				$insert_daily_query .=" task_status_task_id, task_status_last_recurred, status";
				$insert_daily_query .=" ) VALUES ( ";
				$insert_daily_query .=" '{$task_id}', '{$timedate}', 'pending' ";
				$insert_daily_query .=")";
				
				$result_daily = mysqli_query($conn, $insert_daily_query);
				
				$insert_daily_query1 = "INSERT INTO task_track (";
				$insert_daily_query1 .=" task_id, task_track_last_recurred, status, change_time";
				$insert_daily_query1 .=" ) VALUES ( ";
				$insert_daily_query1 .=" '{$task_id}', '{$timedate}','pending', '{$timedate}' ";
				$insert_daily_query1 .=")";
		
				
				$timedate = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($timedate)));
				$result_daily_query1 = mysqli_query($conn, $insert_daily_query1);
				if(!$result_daily || !$result_daily_query1){
					header("Location: login.php");
				}
			
		}
	}else if($_POST["recurrence"] == 'hourly'){
		$end_time = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($timedate)));
		//echo $end_time;
	
	
		while(strtotime($timedate) <= strtotime($end_time)){
				
				$insert_hourly_query = "INSERT INTO task_status (";
				$insert_hourly_query .=" task_status_task_id, task_status_last_recurred, status";
				$insert_hourly_query .=" ) VALUES ( ";
				$insert_hourly_query .=" '{$task_id}', '{$timedate}', 'pending' ";
				$insert_hourly_query .=")"; 
				$result_hourly = mysqli_query($conn,$insert_hourly_query);
				
				$insert_hourly_query1 = "INSERT INTO task_track (";
				$insert_hourly_query1 .=" task_id, task_track_last_recurred, status, change_time";
				$insert_hourly_query1 .=" ) VALUES ( ";
				$insert_hourly_query1 .=" '{$task_id}', '{$timedate}','pending', '{$timedate}' ";
				$insert_hourly_query1 .=")";
				
				$timedate = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($timedate)));
				
				$result_hourly_query1 = mysqli_query($conn,$insert_hourly_query1);
				if(!$result_hourly || !$result_hourly_query1){
					header("Location: login.php");
				}
		
			
		}
	}
	
	
	
	header("Location: manager.php"); 
	
?>
	
<?php
	
}
else{
	?>	
	<a href="create_task.php"> Fill task details</a><br/><br/>
	<?php
	die("Fields cannot be left blank");
}
?>





</HTML>

<?php
mysqli_close($conn);
?>
