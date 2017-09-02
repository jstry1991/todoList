<?php session_start();
$name=$_SESSION['name'];?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
<a href="index.php">Home</a>
<a href="addTasks.php?add=<?php echo $name;?>">AddTasks</a>
<?php
include('dbconnect.php');
$query="SELECT name, priority, task, dueDate, status,ta.taskID FROM person p
INNER JOIN tasks as ta ON p.PID=ta.PID
INNER JOIN duetime as d ON ta.taskID=d.taskID
WHERE name='$name'
GROUP BY name,priority,task,dueDate,status,ta.taskID"; 
$result =mysqli_query($conn,$query);
if ($result->num_rows > 0) {
	echo" <table>
	<tr>
		<th>name</th>
		<th>priority</th>
		<th>task</th>
		<th>status</th>
		<th>Due Date</th>
	</tr>";
	echo"<form action=\"Edit.php\" method =\"POST\">";
	while ($row = mysqli_fetch_assoc($result)){ 
		echo "<tr><td>".$row["name"]."</td><td>".$row["priority"]."</td><td>".$row["task"]."</td><td>".$row["status"]."</td><td>".$row["dueDate"]."</td><td>
		<input type=\"checkbox\" name =\"update[]\"value=\"".$row['taskID']."\">complete".
		"<input type=\"checkbox\" name =\"revert[]\"value=\"".$row['taskID']."\">incomplete".
		"<input type=\"checkbox\" name =\"delete[]\"value=\"".$row['taskID']."\">delete"."</td></tr>";
	}
	echo"</table>";
	echo"<input type=\"submit\" name =\"submit\" value=\"submit\">";
	echo"</form>";
}
else{
	echo"No Tasks Yet!";
} 

include('dbclose.php');
?>
</body>
</html>