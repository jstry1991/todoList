<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<a href="index.php">Home</a>
	<?php
	include('dbconnect.php');
	if(isset($_POST['submit']))
	{
		if($_POST['update'])
		{
			foreach($_POST['update']as $change)
			{

				$query="UPDATE tasks t SET status = 'complete' WHERE taskID = '$change'"; 
				mysqli_query($conn,$query);
			}
			$location = "ViewTask.php";
		}

		if($_POST['revert'])
		{
			foreach($_POST['revert']as $change)
			{

				$query="UPDATE tasks t SET status = 'incomplete' WHERE taskID = '$change'"; 
				mysqli_query($conn,$query);
			}
			$location = "ViewTask.php";
		}
		if($_POST['delete'])
		{
			foreach($_POST['delete']as $change)
			{
				$query="DELETE FROM tasks WHERE taskID='$change'"; 
				mysqli_query($conn,$query);
			}
			$location = "ViewTask.php";
		}
	}
	elseif(isset($_POST['remove']))
	{

		$name = $_POST['Selected'];
		$query="DELETE FROM person WHERE name='$name'"; 
		mysqli_query($conn,$query);
		$location = "index.php";
	}
	else {
		echo"nope";
	}
	header("location:".$location);
	?>
</body>
</html>