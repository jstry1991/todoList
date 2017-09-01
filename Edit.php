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
	}
}
if($_POST['revert'])
{
	foreach($_POST['revert']as $change)
	{

		$query="UPDATE tasks t SET status = 'incomplete' WHERE taskID = '$change'"; 
		mysqli_query($conn,$query);
	}
}
if($_POST['delete'])
{
	foreach($_POST['delete']as $change)
	{
		$query="DELETE FROM tasks WHERE taskID='$change'"; 
		mysqli_query($conn,$query);
	}
}
else {
	echo"nope";
}
header("location:ViewTask.php");
?>
</body>
</html>