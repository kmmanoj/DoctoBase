<html>
	<head>
		<title>USER BUY PAGE</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
	</head>

	<body >
		<?php
			$host="localhost";
			$server="root";
			$password="1337user";
			$db="doctobase";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
			$q="create table transaction(store_id varchar(50), brand_name varchar(50), form varchar(50), quantity int ,cost int ,primary key(store_id,brand_name,form), foreign key(form,brand_name) references medicine(form,brand_name),foreign key(store_id) references store(store_id))";
			$conn->query($q);
			echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\">BUY MEDICINES</div>";
	
		?>

		<center>
		<br/><br/>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Medicine<select name="medicine" class="form-control" id="medicine">
				<option>-------</option>
				<option>ACIVIR</option>
				<option>ALLCLOX</option>
				<option>ALLMOX</option>
				<option>AMANTREL</option>
				<option>AMAXYCILLIN</option>
				<option>AMPIDIL</option>
				<option>AMPILOX</option>
				<option>AMPIPEN</option>
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
			<input type="number" placeholder="enter the quantity" min=1 max=10 step=1 name="quantity"></br></br>
		  <button type="submit" class="btn btn-primary" name="sel_str">SELECT STORE</button>
		  <button type="submit" class="btn btn-primary" name="buy">BUY</button>
		</form>
		<div id="display"></div>
		</center>
			<?php 
				if(isset($_POST["sel_str"]))
				{
					$med=$_POST["medicine"]." ";
					$form=$_POST["form"]." ";
					$qty=$_POST["quantity"];
					
					$q="select st.store_id,st.dealer, st.street, st.area,st.city, st.phone_number, st.pharmacy_chain, s.cost, s.quantity from store st , sells s where s.brand_name='$med' and s.form='$form' and s.quantity>=".$qty." and s.store_id=st.store_id";
					$res=$conn->query($q);
					if($res->num_rows==0){
						echo "<div class=\"container\"><div class=\"alert alert-danger fade in\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong></strong> No Match Found!!!
  </div></div>";
					$display="select * from transaction";
					$res=$conn->query($display);
						if($res->num_rows!=0){
							echo "<table class=\"table\" style=\"background-color:#0064C8\" border=\"1\"><th>Store</th><th>Medicine</th><th>Form</th><th>Quantity</th><th>Cost</th>";
							while($row=$res->fetch_assoc())
								echo "<tr class=\"success\"><td>".$row["store_id"]."</td><td>".$row["brand_name"]."</td><td>".$row["form"]."</td><td>".$row["quantity"]."</td><td>".$row["cost"]."</td></tr>";
							echo "</table>";
						}
					}
					else{
						echo "<div>";
						echo "<form method=\"POST\" action=\"userbuy.php\">";
						echo "<input value='$med' name=\"medicine\" />";
						echo "<input value='$form' name=\"form\" />";
						echo "<input value='$qty' name=\"quantity\" /><br/>";
						echo "AVAILABLE IN:";
						echo "<table  class=\"table\" style=\"background-color:#0064C8\" border=\'1\' style=\"padding-left:100px\"><th>ID</th><th>DEALER</th><th>Address</th><th>Phone number</th><th>Pharmacy</th><th>Cost</th><th>Availability</th>";
						while($row=$res->fetch_assoc())
						{
							$st_id=$row['store_id'];
							echo "<tr class=\"success\"><td>".$row['store_id']."</td><td>";
							echo substr($row['dealer'],0,1)."".strtolower(substr($row['dealer'],1))."</td><td>";
							echo strtolower($row['street']).", ";
							echo strtolower($row['area']).", ";
							echo substr($row['city'],0,1)."".strtolower(substr($row['city'],1))."</td><td>";
							echo $row['phone_number']."</td><td>";
							echo substr($row['pharmacy_chain'],0,1)."".strtolower(substr($row['pharmacy_chain'],1))."</td><td>";
							echo "Rs.".$row['cost']."</td><td>";
							echo $row['quantity']."</td><br/>";
						}
						echo "</table>";
						$res=$conn->query($q);
						echo "<select name=\"store\">";
						while($row=$res->fetch_assoc())
							echo "<option>".$row['store_id']."</option>";
						echo "<div style=\"padding-left:10\"><input type=\"submit\" class=\"btn btn-warning\" value=\"ADD TO CART\" name=\"atc\"/></div>";
						echo "</form></div>";
					}
				}
					
				if(isset($_POST["atc"]))
				{
					$med=$_POST["medicine"];
					$form=$_POST["form"];
					$qty=$_POST["quantity"];
					$st_id=$_POST["store"];
					$qcost="select cost from sells where brand_name='$med' and form='$form' and store_id='$st_id'";
					$res=$conn->query($qcost);
					$row=$res->fetch_assoc();
					$cost=$row['cost'];
					$tot_cost=$cost*$qty;
					$done=FALSE;
					$q1="update transaction set quantity=quantity+".$qty." where brand_name='$med' and form='$form' and store_id='$st_id'";
					$q2="update transaction set cost=cost+".$tot_cost." where brand_name='$med' and form='$form' and store_id='$st_id'";
					$q3="insert into transaction values('$st_id','$med','$form',".$qty.",".$tot_cost.")";
					if($conn->query($q1)===TRUE && $conn->query($q2)===TRUE){ $done=TRUE;}
					if($conn->query($q3)===TRUE){ $done=TRUE;}
					if(!$done){ echo "Error!!"; }	
					$display="select * from transaction";
					$res=$conn->query($display);
					if($res->num_rows!=0){
						echo "<table class=\"table\" style=\"background-color:#0064C8\" border=\"1\"><th>Store</th><th>Medicine</th><th>Form</th><th>Quantity</th><th>Cost</th>";
						while($row=$res->fetch_assoc())
							echo "<tr class=\"success\"><td>".$row["store_id"]."</td><td>".$row["brand_name"]."</td><td>".$row["form"]."</td><td>".$row["quantity"]."</td><td>".$row["cost"]."</td></tr>";
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
						echo "</table></div>";
					
					}
					$q="select sum(cost) sum from transaction";
					$res=$conn->query($q);
					$row=$res->fetch_assoc();
					$tot=0+$row['sum'];
					
					echo "<div class=\"panel-footer\"><h3>TOTAL COST:<b> Rs. ".$tot."</b></h3></div>";
					echo "<hr/></div>";
					echo "<textarea cols=\"40\" rows=\"5\" placeholder=\"Address\"></textarea>";					
					echo "<form action=\"thankcustomer.php\" method=\"POST\" style=\"padding:10px\">";
		 			echo "<button type=\"submit\" class=\"btn btn-primary\">SUBMIT</button></form>";
				}
					
			?>
		<ul class="pager" style="padding-top:100px;padding-left:10px">
			<li class="previous"><a href="user.php">BACK</a></li>
		</ul>
	</body>
</html>

