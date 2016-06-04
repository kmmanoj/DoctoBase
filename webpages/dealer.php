<!DOCTYPE html>
<html>
	<head>
		<title> DEALER PAGE </title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
	</head>
	<body>
		
		<!<center><img src="pic.png" style="position:absolute;left:10%;top:10%" ></center>
		<?php
				$host="localhost";
				$server="root";
				$password="1337user";
				$db="doctobase";
				$conn=new mysqli($host,$server,$password,$db);
				if($conn->connect_error)
					die("Something wrong with the server");
	
				if(isset($_POST['once']))
				{
					$username=$_POST["user"];
					$q="select * from store where dealer='$username'";
					$res=$conn->query($q);
					if($res->num_rows==0) die("<h1>Error 403 : Permission denied</h1> 
		<ul class=\"pager\">
			<li class=\"previous\"><a href=\"dealerlogin.php\">BACK</a></li>
		</ul>");
					else echo "<h3 style=\"padding:10px\">Welcome, ".$username."!!</h3>";
				}
				echo "<a class=\"btn btn-primary\" style=\"position:absolute;right:1%;top:1%;border-radius:20px\" href=\"dealerlogin.php\">LOGOUT</a>	";
				
		?>
	<div class="container">
	<div class="btn-group btn-group-justified" style="padding-top:30%">
		<a class="btn btn-primary" href="dealerbuy.php">Buy Stock</a>
		<a class="btn btn-primary"href="delete.php">Dispose</a>
	</div>
	</div>
			
	</body>
</html>
