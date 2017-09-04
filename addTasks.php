<?php session_start();?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css"></head>
<div class ="center">
	<div class="box">
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
			<p>Add more tasks for <?php echo $name?> below</p>
			<form action="Insert.php" method="post">
				<fieldset>
				<label>name:</label> <?php echo $name;?><br><br>
					<label>task:</label>
					<textarea name ="task" maxlength="200" required></textarea><br><br>
					<label>priority:</label>
					<select name = "priority">
						<option value="high">High</option</option>
						<option value="normal">normal</option</option>
						<option value="low">low</option</option>
					</select><br><br>
					<label>due date:</label> 
					<input type="text" name="date" required><br><br>
					<div class ="center">
					<input type="submit" name ="submit" value="submit">
					</div>
				</fieldset>
			</form>
			<p> View tasks for <?php echo $name;?></p>
			<form action ="ViewTask.php" method ="post">
				<input type="submit" name="view" value="view">
			</form>
		</div>
	</div>
</body>
</html>


