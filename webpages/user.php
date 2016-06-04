<!DOCTYPE html>
<html>
	<head>
		<title> USER PAGE </title>		
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
		<?php
			$host="localhost";
			$server="root";
			$password="1337user";
			//$db="doctobase";
			$db="practice";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
			$q="drop table transaction";
			$conn->query($q);
		?>
		
	</head>
	<body>
		<img src="pic.png" style="position:absolute;left:0%;top:0%;z-index:-1" >
		<center style="padding:100px">
			<a class="btn btn-primary" href="userbuy.php">BUY</a>
			<a class="btn btn-primary" href="knowmore.html">KNOW MORE</a>
		</center> 
		<ul class="pager" style="padding:100px";>
			<li class="previous"><a href="home.html">BACK</a></li>
		</ul>
	</body>
</html>
