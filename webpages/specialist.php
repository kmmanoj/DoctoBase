<!DOCTYPE html>
<html>
	<head>
		<title> SPECIALIST </title>
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
			echo "<div class=\"panel panel-primary\"> <div class=\"panel-heading\"><h3>KNOW MORE ABOUT SPECIALISTS</h3></div>";
		?>

		<?php 
    			echo "<div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class=\"panel-title\">
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse1\">Top Specialists</a>
        </h4>
      </div>
      <div id=\"collapse1\" class=\"panel-collapse collapse \">
        <div class=\"panel-body\">";
			$q="select name from specialist natural join (select count(symptom) count_of_symptoms,specialist_id from treats group by specialist_id order by count(symptom) desc) rank_specialist order by rank_specialist.count_of_symptoms desc";
			$res=$conn->query($q);
			if($res->num_rows>0)
			while($row=$res->fetch_assoc())
				echo "<p>".$row['name']."</p>";
			echo "</div></div></div>";
		?>
		<?php
			
    			echo "<div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class=\"panel-title\">
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse2\">Working Period</a>
        </h4>
      </div>
      <div id=\"collapse2\" class=\"panel-collapse collapse\">
        <div class=\"panel-body\">";
			$q="select name,(24+end_time-start_time)%24 working_time, start_time, end_time from specialist";
			$res=$conn->query($q);
			if($res->num_rows>0){
			echo "<table class=\"table\" style=\"position:relative;top:-600px\"><th>Name</th><th>Begin</th><th>End</th><th>Working time</th>";
				while($row=$res->fetch_assoc())
					echo "<tr><td>".$row['name']."</td><td>".$row['start_time']."</td><td>".$row['end_time']."</td><td>".$row['working_time']."</td></tr><br/>";
				echo "</table></div></div></div>";
			}
		?>
		<?php
  			echo "<div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class=\"panel-title\">
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse3\">Activity</a>
        </h4>
      </div>
      <div id=\"collapse3\" class=\"panel-collapse collapse in\">
        <div class=\"panel-body\">";
		?>
		<form method="POST" action="specialist.php" >
			Time:<input type="number" min=0 max=23 name="time"/>:00
			  <button type="submit" class="btn btn-primary" name="find">Search</button>
		</form>

		<?php
			if(isset($_POST["find"])){
			$time=$_POST['time'];
			$q="select s.name ref ,x.name av from  specialist s left join (select name from specialist where start_time-end_time>0 and (start_time<=".$time." or end_time>=".$time.") union select name from specialist where start_time-end_time<0 and (start_time<=".$time." and end_time>=".$time.")) x  on x.name=s.name";

			$res=$conn->query($q);
			if($res->num_rows>0)
			while($row=$res->fetch_assoc()){
				$name=$row['ref'];
				$av=$row['av'];		
				if($av!=NULL) $av="success";
				else $av="danger";
				echo "<div class=\"container\"><div class=\"alert alert-".$av." fade in\">
				    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\"></a>
				<strong></strong>".$name."
				  </div></div>";
			 }
			}
			echo "</div></div></div>";
		?>
		<?php
			echo "<div class=\"panel panel-info\"> <div class=\"panel-heading\"><h4>Detail</h4></div>";
		?>
		<form method="POST" action="specialist.php" >
			<select class="form-control" name="doc">
				<option>-------</option>
				<option>Dr.Raveena</option>
				<option>Dr.Kavitha Prakash</option>
				<option>Dr.Richard Samson</option>
				<option>Dr.Ranjith Singh</option>
				<option>Dr.Natasha Iyer</option>
				<option>Dr.Celine Francis</option>
				<option>Dr.Shriya</option>
				<option>Dr.Ria Vinod</option>
				<option>Dr.Ruksam</option>
				<option>Dr.Anoop Singh</option>
				<option>Dr.Priya Anand</option>
				<option>Dr.Vikram</option>
				<option>Dr.Shrinath</option>
				<option>Dr.Raksha</option>
				<option>Dr.Hema</option>
				<option>Dr.Ashwini Gowda</option>
				<option>Dr.Prabhakar</option>
				<option>Dr.Karthik</option>
				<option>Dr.Shalini</option>
				<option>Dr.vishnu Rao</option>
				<option>Dr.Catherine</option>
				<option>Dr.Virat</option>
				<option>Dr.Vineet</option>
				<option>Dr.Manish Prasad</option>
				<option>Dr.Shastry</option>
				<option>Dr.laila</option>
				<option>Dr.Neilson Robert</option>
				<option>Dr.Vishwas Mehta</option>
				<option>Dr.Adil Shah</option>
				<option>Dr.Manasa Nair</option>
			</select>
			  <button type="submit" class="btn btn-primary" name="det">Search</button>
		</form>
		<?php
			if(isset($_POST['det'])){
			$doc=$_POST['doc'];
			$q="select * from specialist where name='$doc'";
			$res=$conn->query($q);
			if($doc!="-------"){
			if($res->num_rows>0)
			while($row=$res->fetch_assoc()){echo "<pre>";
				echo "<h3>Name: 		".$row['name']."</h3>";
				echo "<h3>Email-id: 	".$row['email_id']."</h3>";
				echo "<h3>Phone number:	".$row['phone_number']."</h3>";
				echo "<h3>Hospital: 	".$row['hospital']."</h3>"; 
				echo "</pre>";
			}
			echo "</div></div></div></div>"; }
			}
		?>
			
						
		<ul class="pager" style="padding:100px";>
			<li class="previous"><a href="knowmore.html">BACK</a></li>
		</ul>
	</body>
</html>






