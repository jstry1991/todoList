<?php session_start()?>
<!DOCTYPE html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<html>
<body>
<a href="index.php">Home</a>
	<?php 
	include('dbconnect.php');
	if(isset($_POST['submit']))
		{	$rob = $_SESSION['name']; 
			$query = "SELECT PID FROM person WHERE name ='$rob'";
			$result=mysqli_query($conn,$query); 
			$row = mysqli_fetch_assoc($result);
			$PID = $row['PID'];
			$priority = $_POST['priority']; 
			$task = $_POST['task']; 
			$date = $_POST['date'];
			$query="INSERT INTO tasks(task,priority,PID) VALUES('$task','$priority',$PID)"; 
			mysqli_query($conn,$query);
			$query="INSERT INTO duetime(dueDate,taskID) VALUES('$date',LAST_INSERT_ID())"; 
			mysqli_query($conn,$query);
		}
header("location:ViewTask.php");
include('dbclose.php');
?>
</body>
</html>