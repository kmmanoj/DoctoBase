<!DOCTYPE html>
<html>
	<head>
		<title>THANK YOU!!! </title>
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
			$dealer=$_POST['name'];
			$q="select store_id from store where dealer='$dealer'";
			$res=$conn->query($q);
			$row=$res->fetch_assoc();
			$st_id=$row['store_id'];
			if($st_id==NULL){	
				$q="drop table transaction";
				$conn->query($q);
				die("<div class=\"container\"><div class=\"alert alert-danger fade in\">
				    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				    <strong>Sorry!!!</strong> Incorrect authorization
				  </div></div>
					<ul class=\"pager\" style=\"padding:100px\";>
				<li class=\"previous\"><a href=\"home.html\">HOME</a></li>
			</ul>");}
	
			$q="select * from transaction";
			$res=$conn->query($q);
			
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
					$med=$row['brand_name'];
					$form=$row['form'];
					$qty=$row['quantity'];
					
					$manf_date=rand(1,28);
					$manf_month=rand(1,12);
					$manf_year=rand(2013,2015);
					$manf=$manf_year."-".$manf_month."-".$manf_date;
					$exp_date=rand(1,28);
					$exp_month=rand(1,12);
					$exp_year=(int)$manf_year+rand(1,4);
					$exp=$exp_year."-".$exp_month."-".$exp_date;
									
			
					$qcost="select cost from medicine where brand_name='$med' and form='$form'";
					$result=$conn->query($qcost);
					$rowc=$result->fetch_assoc();	
					$cost=$rowc['cost']+0.1*$rowc['cost']-rand(0,0.2*$rowc['cost']);
					$q1="insert into sells values('$st_id','$med','$form','$manf','$exp',".$qty.",".$cost.")";
					if($conn->query($q1)!==TRUE){ $q1="update sells set quantity=quantity+".$qty." where store_id='$st_id' and brand_name='$med' and form='$form'";$conn->query($q1);
				$q1="update sells set manf_date='$manf' where store_id='$st_id' and brand_name='$med' and form='$form'";$conn->query($q1);
	$q1="update sells set exp_date='$exp' where store_id='$st_id' and brand_name='$med' and form='$form'";$conn->query($q1);}
				
				}
			}
			$q="drop table transaction";
			$conn->query($q);
			?>

			<div class="panel panel-primary"> <div class="panel-heading"><h1>THANK YOU for using DoctoBase</h1></div>
			<h3>Your Transaction number:</h3>
			<script type="text/javascript"> 
				var d=new Date();
				document.writeln("<h2>"+d.getTime()+"</h2>");
			</script><div class="container"><div class="alert alert-info fade in">
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
