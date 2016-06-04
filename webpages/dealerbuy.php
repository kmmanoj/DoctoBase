<html>
	<head>
		<title>DEALER BUY PAGE</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
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
	
			$q="create table transaction(brand_name varchar(50), form varchar(50), quantity int ,cost int ,primary key(brand_name,form), foreign key(form,brand_name) references medicine(form,brand_name))";
			$conn->query($q);
			echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\">BUY MEDICINES</div>";
			echo "<ul class=\"pager\" style=\"position:relative;\";>
			<li class=\"previous\"><a href=\"dealerlogin.php\">LOGOUT</a></li>
		</ul>";
	
		?>
		<center>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Medicine
			<select name="medicine" class="form-control" id="medicine">
				<option>-------</option>
				<option>ACIVIR</option>
				<option>ALLCLOX</option>
				<option>ALLMOX</option>
				<option>AMANTREL</option>
				<option>AMAXYCILLIN</option>
				<option>AMPIDIL</option>
				<option>AMPILOX</option>
				<option>AMPIPEN</option>
				<option>ANAWIN</option>
				<option>ANEKET</option>
				<option>ANTHEL</option>
				<option>ASPENT</option>
				<option>ASPICOT</option>
				<option>ATROREN-P</option>
				<option>BESTOZYME</option>
				<option>BIOCILIN</option>
				<option>CALAPTIN</option>
				<option>CARADACE</option>
				<option>CARBATOL</option>
				<option>CARBOPLAN</option>
				<option>CARCA</option>
				<option>CARDIVAS</option>
				<option>CEFIZOX</option>
				<option>CEFSPAN</option>
				<option>CERVIPRIME-GEL</option>
				<option>CETRIN</option>
				<option>CLADITAM</option>
				<option>COLIRID</option>
				<option>CONCOR</option>
				<option>CORPRIL</option>
				<option>CYCLOVIR</option>
				<option>DAIVONEX</option>
				<option>DALACIN-C</option>
				<option>DAZOLIC</option>
				<option>DIAMICRON</option>
				<option>DIAMOX</option>
				<option>DIZEC</option>
				<option>DOLOID</option>
				<option>DOXETAR</option>
				<option>DROTIN</option>
				<option>DURACARD</option>
				<option>DYNACARD</option>
				<option>E-MYCIN</option>
				<option>ENSAMYCIN</option>
				<option>ENVORM</option>
				<option>ENZYSTAL</option>
				<option>EPIDOSIN</option>
				<option>EPOCELIN</option>
				<option>E-PRIN</option>
				<option>EROATE</option>
				<option>EROWIN</option>
				<option>EXIPEACE</option>
				<option>FELDEX</option>
				<option>FLUCAN</option>
				<option>FULSED</option>
				<option>GARAMYCIN</option>
				<option>GEKARE</option>
				<option>GIRO</option>
				<option>GLUCOBAY</option>
				<option>HAMYCIN</option>
				<option>HERPEX</option>
				<option>IDILIN</option>
				<option>IOTIM</option>
				<option>KAPILIN</option>
				<option>KETAMAX</option>
				<option>LIORESAL</option>
				<option>LORIDIN</option>
				<option>LORVAS</option>
				<option>MAMOFEN</option>
				<option>MIGRATANE</option>
				<option>MINIPRES-XL</option>
				<option>MOBIDIN</option>
				<option>MOZEP</option>
				<option>MYCOSTATIN-VAGINAL</option>
				<option>MYSOLIN</option>
				<option>NAM</option>
				<option>NARCOTAN</option>
				<option>NORPACE</option>
				<option>N-SIDE</option>
				<option>OCOBAR</option>
				<option>OCULAN</option>
				<option>OLANEX</option>
				<option>OLYSTER</option>
				<option>ONCOTAM</option>
				<option>ORAP</option>
				<option>OSDIL</option>
				<option>PG-TAB</option>
				<option>PIMO</option>
				<option>PLACIDOX</option>
				<option>PRAVATOR-10</option>
				<option>PRAVATOR-20</option>
				<option>PRAZOPRESS</option>
				<option>PRIMITROST</option>
				<option>RAMACE</option>
				<option>RECOLINA</option>
				<option>REGUBEAT</option>
				<option>REVICI</option>
				<option>RIBAVIN</option>
				<option>ROXITEN</option>
				<option>SALITOR</option>
				<option>SEREPAX</option>
				<option>SISOPTIN</option>
				<option>SOFRAMYCIN</option>
				<option>SUCRAMAL</option>
				<option>SUMINAT</option>
				<option>SUMITREX</option>
				<option>SYNOMAX</option>
				<option>TERALFA</option>
				<option>TETRET</option>
				<option>THROMBONIL</option>
				<option>TINADERM</option>
				<option>TOLSOL</option>
				<option>TRICLORYL</option>
				<option>TRIVASTAL-LA</option>
				<option>UKIDAN</option>
				<option>UNIWARFARIN</option>
				<option>UROKINASE</option>
				<option>VASOPTEN</option>
				<option>VERAMIL</option>
				<option>VERTIN</option>
				<option>VISKEN</option>
				<option>XIPAMIDE</option>
				<option>ZOPICON</option>
				<option>ZYRULINA</option>
			</select>
			<?php
			  echo "<button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"forms\">FORMS?</button>";
				if(isset($_POST["forms"]))
				{
					$med=$_POST["medicine"];
					$qform="select form from medicine where brand_name='$med'";
					if($med!="-------"){ 
						$obj= $conn->query($qform);
						echo " Available in:";
						while($forms=$obj->fetch_assoc()) echo $forms['form']." ";
						echo "<br/>";
					}
					echo "<script> var medicine=document.getElementById(\"medicine\");
						medicine.value='$med'</script>";
				}
			?>
			</br></br>
			Form
			<select name="form" class="form-control">
				<option>-------</option>
				<option>CAPSULE</option>      
				<option>DPS</option>           
				<option>INJECTION</option>     
				<option>LIQUID</option>        
				<option>OINTMENT</option>      
				<option>SOLUTION</option>      
				<option>SUSPENSION</option>    
				<option>SYRINGE</option>       
				<option>SYRUP</option>         
				<option>TABLET</option>        
				<option>VIAL</option>          
				<option>VIALINJECTION</option>
			</select>
			</br></br>
			Quantity:
			<input type="number" placeholder="enter the quantity" min=1 max=120 step=1 name="quantity"></br></br>
			  <button type="submit" class="btn btn-primary" name="atc">ADD TO CART</button>
			  <button type="submit" class="btn btn-primary" name="buy">BUY</button>
		</form>
		</center>
			<?php 				
				if(isset($_POST["atc"]))
				{
					$med=$_POST["medicine"];
					$form=$_POST["form"];
					$qty=$_POST["quantity"];
					$qcost="select cost from medicine where brand_name='$med' and form='$form'";
					$res=$conn->query($qcost);
					if($res->num_rows==0){ 				
						echo "<div class=\"container\"><div class=\"alert alert-danger fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong></strong> No Match Found!!!
  </div></div>"; }
					else{
						$row=$res->fetch_assoc();
						$cost=$row['cost'];
						$tot_cost=$cost*$qty;
						$done=FALSE;
						$q1="update transaction set quantity=quantity+".$qty." where brand_name='$med' and form='$form'";
						$q2="update transaction set cost=cost+".$tot_cost." where brand_name='$med' and form='$form'";
						$q3="insert into transaction values('$med','$form',".$qty.",".$tot_cost.")";
						if($conn->query($q1)===TRUE && $conn->query($q2)===TRUE){ $done=TRUE; }
						if($conn->query($q3)==TRUE){ $done=TRUE; }
						if(!$done){ echo "Error!!"; }	
					}
						$display="select * from transaction";
						$res=$conn->query($display);
						if($res->num_rows!=0){
							echo "<table class=\"table\" style=\"background-color:#0064C8\" border=\"1\"><th>Medicine</th><th>Form</th><th>Quantity</th><th>Cost</th>";
							while($row=$res->fetch_assoc())
								echo "<tr class=\"success\"><td>".$row["brand_name"]."</td><td>".$row["form"]."</td><td>".$row["quantity"]."</td><td>".$row["cost"]."</td></tr>";
							echo "</table>";
						}	
				
				}
				if(isset($_POST["buy"]))
				{
					echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\">Bill</div>";
					echo "<div class=\"panel-body\">";
					$q="select * from transaction";
					$res=$conn->query($q);
					if($res->num_rows!=0){
						echo "<table style=\"background-color:#0064C8\" class=\"table\"><th>Medicine</th><th>Form</th><th>Quantity</th><th>Cost</th>";
						while($row=$res->fetch_assoc())
							echo "<tr class=\"success\"><td>".$row["brand_name"]."</td><td>".$row["form"]."</td><td>".$row["quantity"]."</td><td>".$row["cost"]."</td></tr>";
						echo "</table>";
					
					}
					echo "<hr/>";
					$q="select sum(cost) sum from transaction";
					$res=$conn->query($q);
					$row=$res->fetch_assoc();
					$tot=0+$row['sum'];
					echo "<div class=\"panel-footer\"><h3>TOTAL COST:<b> Rs. ".$tot."</b></h3></div>";
					echo "<hr/>";
					echo "<form action=\"thankdealer.php\" method=\"POST\" style=\"padding:10px\">";
					echo "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Dealer name\"/>";
		 			echo "<button type=\"submit\" class=\"btn btn-primary\">SUBMIT</button></form";
				}
		?>
	</body>
</html>

