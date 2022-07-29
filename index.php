<?php
	include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial+scale=1.0">
	<title>ShmidtLB1</title>
	<script src = "AJAX.js"></script>
<head>

<body>

	<h4>Оберіть медсестру, чиї зміни ви хочете побачити</h4>
		<select name="nursename" id="nursename">
			<?php
				try
				{
					$sql="SELECT name FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$name = $row[0];
						print "<option value='$name'>$name</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<button onclick="getText()"> ОК </button>
		
		<table border='2'>
		<thead>
			<tr>
				<th>WardName</th>
				<th>Date</th>
				<th>Department</th>
				<th>Shift</th>
			</tr>
		</thead>
		<tbody id="1"></tbody>
		</table>
		
		<h4>Оберіть відділ, чиїх медсестер ви хочете побачити</h4>
		<select name="depart" id="depart">
			<?php
				try
				{
					$sql="SELECT DISTINCT department FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$department = $row[0];
						print "<option value='$department'>$department</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<button onclick="getXML()"> ОК </button>
		
		<table border='2'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Shift</th>
			</tr>
		</thead>
		<tbody id="2"></tbody>
		</table>
	
	<h4>Оберіть зміни, чиїх медсестер ви хочете побачити</h4>
	
		<select name="shiftname">
			<?php
				try
				{
					$sql="SELECT DISTINCT shift FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$shift = $row[0];
						print "<option value='$shift'>$shift</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<button onclick="getJSON()"> ОК </button>
	<table border='2'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody id="3"></tbody>
		</table>
	
</body>
</html>

