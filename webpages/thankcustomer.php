<!DOCTYPE html>
<html>
	<head>
		<title>THANK YOU!!!</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
		<script src="bootstrap/jquery.min.js"/></script>
		<script src="bootstrap/bootstrap.min.js"/></script>		
	</head>
	<body>
		<?php
			$host="localhost";
			$server="root";
			$password="1337user";
			$db="doctobase";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
			$q="start transaction";
			$conn->query($q);
			$q="select * from transaction";
			$res=$conn->query($q);
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
					$stid=$row['store_id'];
					$med=$row['brand_name'];
					$form=$row['form'];
					$qty=$row['quantity'];
					$q="update sells set quantity=quantity-".$qty." where store_id='$stid' and brand_name='$med' and form='$form'";
					$conn->query($q);
					$q="select quantity from sells where store_id='$stid' and brand_name='$med' and form='$form'";
					$check=$conn->query($q);
					$out=$check->fetch_assoc();
					if($out['quantity']<0){
						$q="rollback";
						$conn->query($q);
						$q="drop table transaction";
						$conn->query($q);
						die("<div class=\"container\"><div class=\"alert alert-danger fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Sorry!!!</strong> One of the products is out of stock
  </div></div>
			<ul class=\"pager\" style=\"padding:100px\";>
				<li class=\"previous\"><a href=\"home.html\">HOME</a></li>
			</ul>");			}

						
				}
			}
			$q="commit";
			$conn->query($q);
			$q="drop table transaction";
			$conn->query($q);
			?>

			<div class="panel panel-primary"> <div class="panel-heading"><h1>THANK YOU for using DoctoBase</h1></div>
			<h3>Your Transaction number:</h3>
			<script type="text/javascript"> 
				var d=new Date();
				document.writeln("<h2>"+d.getTime()+"</h2>");
			</script>
			<div class="container"><div class="alert alert-info fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>CASH ON DELIVERY!!</div></div>
			<?php
				echo "<div class=\"container\"><div class=\"alert alert-warning fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Note!!!</strong>  You may return anything during the time of delivery, if you are not satisfied with our products 
  </div></div>";	?>
		
			</div>
			<ul class="pager" style="padding:100px";>
				<li class="previous"><a href="home.html">HOME</a></li>
			</ul>
	</body>
</html>
