
	<?php
		header('Content-Type: text/xml');
		header('Cache-Control: no-cache, must-revalidate');
		include("connect.php");
		$department=$_GET["depart"];
			
		$sql="SELECT name, date, shift FROM nurse WHERE department=:department";
		$sth=$dbh->prepare($sql);
		$sth->execute(array(":department"=>$department));
		$cursor = $sth->fetchAll();
		print '<?xml version="1.0" encoding="UTF-8"?>';
		print "<root>";
		foreach ($cursor as $row)
		{
			$name = $row[0];
			$date = $row[1];
			$shift = $row[2];
			print "<row><name>$name</name><date>$date</date><shift>$shift</shift></row>";
		}
				
		echo "</root>";
	?>