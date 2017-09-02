<?php session_start();?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<body>
	<a href="index.php">Home</a>
	<p>select a name from the list</p>
	<form action ="addTasks.php" method ="post">
		name:
		<?php
		include('dbconnect.php');
		$query="SELECT PID,name FROM person";
		$result = mysqli_query($conn,$query);
		echo"<select name ='Selected'>";
		if ($result->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)){ 
				echo"<option value='".$row['name']."'>".$row['name']."</option>";
			}
		}
		echo"</select>";
		include('dbclose.php');
		?>
		<input type ="submit" name="select" value = "submit">
		<input type ="submit" name = "remove" value ="remove" formaction="Edit.php">
	</form>
	<p> or create a name to make a new todo list</p>
	<form action="addTasks.php" method= "post">
		name: 
		<input type="text" name ="name" placeholder="Enter name here" required>
		<input type=submit name ="insert" value = "submit">
		<button type="reset" >Clear</button>
	</form>
	<?php
	if(isset($_SESSION['message']))
	{ 
		echo $_SESSION['message'];
	}
	?>
</body>
</html>