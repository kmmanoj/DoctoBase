<!DOCTYPE html>
<html>
	<head>
		<title>MEDICINE</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
	</head>
	<body style="padding-top:10px">
		<?php
			$host="localhost";
			$server="root";
			$password="1337user";
			$db="doctobase";
			$conn=new mysqli($host,$server,$password,$db);
			if($conn->connect_error)
				die("Something wrong with the server");
			echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\"><h3>KNOW MORE ABOUT MEDICINE</h3></div>";
		?>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="container" style="padding:10px;">
			<div class="form-group">
			<label for="name">Medicine</label>
			<select class="form-control" style="background-color:rgb(255,255,200)" name="medicine">
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
			<br/>
			  <button type="submit" class="btn btn-info" name="sub">Search</button>
			</div></div>
			<br/>
		</form>
		<?php
			if(isset($_POST["sub"]))
			{
				if($_POST["medicine"]!="-------")
				{
					$medicine=$_POST["medicine"]; 
					echo "<div class=\"panel panel-info\"> <div class=\"panel-heading\"><h4>".$medicine."</h4></div>";
					$q="select distinct drug_name, manufacturer from medicine where brand_name='$medicine'";
					$res=$conn->query($q);
					if($res->num_rows>0)
					{	
						while($row=$res->fetch_assoc())
						{
							echo "<h4>Drug name: ".$row["drug_name"]."</h4>";
							echo "<h4>Manufacturer: ".$row["manufacturer"]."</h4>";
						}
					}	
					$q="select class, dosage from drug where drug_name=(select distinct drug_name from medicine where brand_name='$medicine')";
					$res=$conn->query($q);
					if($res->num_rows>0)
					{	
						while($row=$res->fetch_assoc())
						{
							echo "<h4>Classification: ".$row["class"]."</h4>";
							echo "<h4>Dosage: ".$row["dosage"]."</h4>";
						}
					}
					$q="select f.form, m.packing, m.cost from (select distinct form from medicine) f left join (select * from medicine where brand_name='$medicine') m on f.form=m.form";
					$res=$conn->query($q);
					if($res->num_rows>0)
					{	
						echo "<table class=\"table\" style=\"background-color:#f4511e\" border=\"1\"><th>Form</th><th>Packing</th><th>Cost</th>";
						while($row=$res->fetch_assoc())
						{
							$av="success";
							if($row["packing"]==NULL) $av="danger";
							echo "<tr class='$av'><td>".$row["form"]."</td>";
							echo "<td>".$row["packing"]."</td>";
							echo "<td>".$row["cost"]."</td></tr>";
						}
						echo "</table>";
					}
					$q="select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name='$medicine'))";
					$res=$conn->query($q);
					if($res->num_rows>0)
					{	
						echo "<div class=\"panel panel-info\"> <div class=\"panel-heading\">TREATEMENT FOR</div><div class=\"panel-body\">";
						while($row=$res->fetch_assoc())
							echo $row["symptom"]."<br/>";
						echo "</div>";
					}
					$q="select name from specialist where specialist_id in (select distinct specialist_id from treats where specialist_id not in (select distinct s.specialist_id from (select s.specialist_id from treats s, (select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name='$medicine'))) l where s.symptom=l.symptom) s, (select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name='$medicine'))) tmp))";
					$res=$conn->query($q);
					if($res->num_rows>0)
					{	
						echo "<div class=\"panel panel-info\"> <div class=\"panel-heading\">SUGGESTED SPECIALIST</div><div class=\"panel-body\">";
						while($row=$res->fetch_assoc())
							echo $row["name"]."<br/>";
						echo "</div>";
						echo "<a class=\"btn btn-primary\" href=\"specialist.php\"> More about specialists </a>";
						
					}

				}
			}
		?>
		<ul class="pager">
			<li class="previous"><a href="knowmore.html">BACK</a></li>
		</ul>
	</body>
</html>
