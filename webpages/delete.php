<html>
	<head>
		<title>DISPOSE</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
		<script src="bootstrap/jquery.min.js"/></script>
		<script src="bootstrap/bootstrap.min.js"/></script>	
	</head>
	<body>
		<?php
			$d=$_POST['year'];
			$d;

			$host="localhost";
			$server="root";
			$password="1337user";
			$db="doctobase";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
		
			if(isset($_POST["secure"])){
			$dealer=$_POST['dealer'];
			$check="select * from store where dealer='$dealer'";
			$res=$conn->query($check);
			if($res->num_rows==0) 
				 die("<h1> Error 403 : Permission Denied </h1><a href=\"dealerlogin.php\"> back </a> "); 
			$row=$res->fetch_assoc();
			$st_id=$row['store_id'];
			$q="select * from sells where extract(year from exp_date)<".$d." and store_id='$st_id'";
			$q="delete from sells where extract(year from exp_date)<".$d." and store_id='$st_id'";
			if($conn->query($q)===TRUE)
				echo "<div class=\"container\"><div class=\"alert alert-success fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>SUCCESS!!!</strong> Cleaned Store!!!
  </div></div>";
			else 
				echo "<div class=\"container\"><div class=\"alert alert-danger fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Error!!!</strong> Something went wrong!!!
  </div></div>";
			$q="delete from sells where quantity<=0 and store_id='$st_id'";
			$conn->query($q);
			echo "<ul class=\"pager\" style=\"padding:100px\";>
			<li class=\"previous\"><a href=\"dealerlogin.php\">BACK</a></li>
		</ul>"; }
		?>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="container">
		 <div class="form-group" style="padding-top:100px;padding-left:100px">
		  	<h1> Dispose Old stocks</h1>
			<label>Name</label><input type="text" class="form-control" name="dealer"/><br/>
			Dispose medicines before date(dd/mm/yyyy):<br/>
			<input type="number" value=31 name="date" disabled/> -
			<input type="number" value=12 name="month" disabled/> -
			<input type="number" min=2000 max=2100 name="year" /><br/>
			<br/>
			  <button type="submit" class="btn btn-danger" name="secure">Dispose!!!</button>
		  </div>
		</div>
		</form>

		<ul class="pager" style="padding:100px";>
			<li class="previous"><a href="home.html">BACK</a></li>
		</ul>	
		</div>
	</body>
</html>

