<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
	<a href="index.php">Home</a>
	<?php 
	include('dbconnect.php');

	if(isset($_POST['insert']))
	{ 
		$_SESSION['name']=$_POST['name'];
		$name = $_SESSION['name'];
		$query ="SELECT name FROM person WHERE name = '$name'";
		$result=mysqli_query($conn,$query);
		if( $result->num_rows ==0)
		{
			unset($_SESSION['message']);
			$query="INSERT INTO person(name) VALUES('$name')";
			mysqli_query($conn,$query);
		}
		else
		{
			$_SESSION['message']= 'name already exists!';
			header("location:index.php");
		}
	}
	if(isset($_POST['select']))
	{
		$_SESSION['name']=$_POST['Selected'];
		$name = $_SESSION['name'];

	}
	if(isset($_GET['add']))
	{
		$name = $_GET['add'];
	}
	include('dbclose.php');
	?>
	<p>If you wish to add more tasks, fill in the options below</p>
	<form action="Insert.php" method="post">
		<fieldset>
			name: <?php echo $name;?><br><br>
			task:
			<textarea name ="task" required></textarea><br><br>
			priority:
			<select name = "priority">
				<option value="high">High</option</option>
				<option value="normal">normal</option</option>
				<option value="low">low</option</option>
			</select><br><br>
			due date: 
			<input type="text" name="date" required><br><br>
			<input type="submit" name ="submit" value="submit">
		</fieldset>
	</form>
	<p> if you wish to view the list of tasks so far, click the view button below</p>
	<form action ="ViewTask.php" method ="post">
		<input type="submit" name="view" value="view">
	</form>
</body>
</html>


