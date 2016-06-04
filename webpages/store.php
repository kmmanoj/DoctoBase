<!DOCTYPE html>
<html>
	<head>
		<title>STORE</title>
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
			echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\"><h3>KNOW MORE ABOUT STORES</h3></div>";
		?>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br/>
			<label> City-wise medicine cost: </label>
			<div class="container" style="padding:10px">
			<div class="form-group">
			<label for="name">Medicine</label>
			<select class="form-control" style="background-color:rgb(255,255,200)" name="medicine" id="medicine">
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
			<br/><br/>
			<label>Form</label>
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
			<label>City</label>
			<select name="city" class="form-control">
				<option>BHOPAL</option>
				<option>BANGALORE</option>
				<option>CHANDIGAR</option>
				<option>MARGAO</option>
				<option>SECUNDERABAD</option>
				<option>INDORE</option>
				<option>VELLORE</option>
				<option>PUNE</option>
				<option>BALMER</option>
				<option>LUCKNOW</option>
				<option>GURGAON</option>
				<option>CHENNAI</option>
				<option>HYDERABAD</option>
				<option>PUNJAB</option>
				<option>MANGALORE</option>
				<option>DELHI</option>
				<option>KOCHI</option>
				<option>MYSORE</option>
				<option>GARIAHAT</option>
				<option>BILASPUR</option>
				<option>AHMEDABAD</option>
			</select>
			  <button type="submit" class="btn btn-primary" name="sub">Search</button>
			</div>
		</form>
		<?php
			$medicine=$_POST['medicine'];
			$form=$_POST['form'];
			$city=$_POST['city'];
			$q="select avg(cost) cost from sells where store_id in (select store_id from store where city='$city') and brand_name='$medicine' and form='$form'";		
			$res=$conn->query($q);
			if($res->num_rows>0)
			{ $row=$res->fetch_assoc();
				if($row['cost']!=NULL) echo "<br/>Rs. ".$row['cost']."<br/>";
				else echo "<br/>NA<br/>";
			}
			echo "</div>";	
		?>
	<hr/>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br/>
			<label> Pharmacy-wise medicine cost: </label>
			<div class="container">
			<div class="form-group">
			<label for="name">Medicine</label>
			<select class="form-control" style="background-color:rgb(255,255,200)" name="medicine" id="medicineinpharmacy">
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
			  echo "<button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"formsinpharmacy\">FORMS?</button>";
				if(isset($_POST["formsinpharmacy"]))
				{
					$med=$_POST["medicine"];
					$qform="select form from medicine where brand_name='$med'";
					if($med!="-------"){ 
						$obj= $conn->query($qform);
						echo " Available in:";
						while($forms=$obj->fetch_assoc()) echo $forms['form']." ";
						echo "<br/>";
					}
					echo "<script> var medicine=document.getElementById(\"medicineinpharmacy\");
						medicine.value='$med'</script>";
				}
			?>
			<br/><br/>
			<label>Form</label>
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
			<label>Pharmacy</label>
			<select name="pharmacy" class="form-control">
				<option>APOLLO</option>
				<option>DHANWNATARY</option>
				<option>FORTIS</option>
				<option>LIFEKEN</option>
				<option>MEDPLUS</option>
				<option>VIVA</option>
			</select>
			  <button type="submit" class="btn btn-primary" name="sub">Search</button>
			<br/>
		</form>
		<?php
			$medicine=$_POST['medicine'];
			$form=$_POST['form'];
			$pc=$_POST['pharmacy'];
			$q="select avg(cost) cost from sells where store_id in (select store_id from store where pharmacy_chain='$pc') and brand_name='$medicine' and form='$form'";
			$res=$conn->query($q);
			if($res->num_rows>0)
			{ 	$row=$res->fetch_assoc();
				if($row['cost']!=NULL) echo "<br/>Rs. ".$row['cost']."<br/>";
				else echo "<br/>NA<br/>";
			}
			echo "</div></div>";
		?>
		<ul class="pager" style="padding:100px";>
			<li class="previous"><a href="knowmore.html">BACK</a></li>
		</ul>
	</body>
</html>


