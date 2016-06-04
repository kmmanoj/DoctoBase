<html>
	<head>
	<title> DEALER </title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
	</head>
	<body>
		<img src="pic.png" style="position:absolute;left:0%;top:0%;z-index:-1" >
		<?php
			$host="localhost";
			$server="root";
			$password="1337user";
			$db="doctobase";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
			$q="drop table transaction";
			$conn->query($q);
		?>
	
		<form method="POST" action="dealer.php">
		 <div class="form-group" style="padding-top:200px;padding-left:100px">
		  	<h1> Dealer Login Form</h1>
		    <label for="email">Dealer Name:</label>
		    <input type="text"name="user" class="form-control"><br/>
		  <button type="submit" class="btn btn-primary" name="once">Submit</button>
		  </div>
		</form>

		<ul class="pager" style="padding:100px";>
			<li class="previous"><a href="home.html">BACK</a></li>
		</ul>
	</body>
</html>
