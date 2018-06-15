<?php 
	session_start();
	//echo $_GET["task_id"];
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
$query = "SELECT * from task_status where task_status_task_id = '{$_GET["task_id"]}' and task_status_last_recurred = '{$_GET["start_time"]}' LIMIT 1";
$result = mysqli_query($conn, $query);
if(!$result){
	header("Location: manager.php");
}
$row = mysqli_fetch_assoc($result);


?>

<?php 
	if(ISSET($_POST["submit"])){
		//INSERT INTO task_notes (task_id, task_notes_last_recurred, notes  ) VALUES ( '10', "2018-06-14 16:38:18", "Hello")
		//echo $_POST["note"];
		//echo $_GET["task_id"];
		//echo $_GET["start_time"];
		
		
		$insert_note_query ="INSERT INTO task_notes (";
		$insert_note_query .=" task_id, task_notes_last_recurred, notes ";
		$insert_note_query .=" ) VALUES ( ";
		$insert_note_query .=" '{$_GET["task_id"]}', '{$_GET["start_time"]}','{$_POST["note"]}' ";
		$insert_note_query .=")";
		$insert_note_result = mysqli_query($conn,$insert_note_query);
		if(!$insert_note_result) 
			header("Location: manager.php") ; 
	
}
?>



<h2> Final Status Of Task ->  <?php echo $row["status"]; ?></h3> 
<?php 
	$query1 = "SELECT * from task_track where task_id = '{$_GET["task_id"]}' and task_track_last_recurred = '{$_GET["start_time"]}' ORDER BY change_time";
	$result1 = mysqli_query($conn, $query1);
	if(!$result1){
		header("Location: manager.php");
	}
	
?>
<table border = "1">
  <tr>
    
	<th> Status</th>
	<th>Change Time</th>
	
	
  </tr>
  <?php while($row = mysqli_fetch_assoc($result1)){
		
  ?>
  <tr>
    <td><?php echo $row["status"]; ?></td>
    <td><?php echo $row["change_time"]; ?></td>
  </tr>
  <?php } ?>
</table>

<?php 
	$query_get_notes = "SELECT * from task_notes where task_id = '{$_GET["task_id"]}' and task_notes_last_recurred = '{$_GET["start_time"]}'";
	$result_get_notes = mysqli_query($conn, $query_get_notes);
	if(!$result_get_notes){
		header("Location: manager.php");
	}
	if(mysqli_num_rows($result_get_notes)){
		?>
		<br /> <br /><h2> Notes</h2>
		
	<?php
		while($note_row = mysqli_fetch_array($result_get_notes)){
		?>
			<p><?php echo $note_row["notes"]; ?></p>
			<hr>
		
		<?php 
		}
	} ?>

<br /><br />


<FORM ACTION="task_detail.php?task_id=<?php echo $_GET["task_id"]; ?>&start_time=<?php echo $_GET["start_time"]; ?>" method="post">
  
  <textarea name="note" rows="4" cols="50">
	</textarea><br / >
  
  <input type="submit" name="submit" value="Add Note">
</form>



</BODY>
</HTML>