<?php
session_start();
include ('../config/db_config.php');
if(isset($_SESSION['dept_id'])){
	$dept_id=$_SESSION['dept_id'];
}else{
	$dept_id=$_POST['dept_id'];
}


if(isset($_POST['changestatus'])){

	$s; $new;
	$sql = "SELECT status,acad_year,sem_type FROM current_state where dept_id='$dept_id'";
	$result = $conn->query($sql);                     
	while($row=$result->fetch_assoc()){
		$s=$row['status'];
	}
	
	if($s==0)
		$new=1;
	else
		$new=0;


	$sql = "UPDATE current_state SET status='$new' where dept_id='$dept_id'";
	if ($conn->query($sql) === TRUE){

	} else{

	}

}

if(isset($_POST['changeAcadYear'])){


	$new=$_POST["acad_year"];


	$sql = "UPDATE current_state SET acad_year='$new' where dept_id='$dept_id'";
	if ($conn->query($sql) === TRUE){

	} else{

	}

}
if(isset($_POST['changeStartTime'])){


	$new=$_POST["start_time"];


	$sql = "UPDATE current_state SET start_time='$new' where dept_id='$dept_id'";
	if ($conn->query($sql) === TRUE){

	} else{

	}

}
if(isset($_POST['changeEndTime'])){


	$new=$_POST["end_time"];


	$sql = "UPDATE current_state SET end_time='$new' where dept_id='$dept_id'";
	if ($conn->query($sql) === TRUE){

	} else{

	}

}

if(isset($_POST['changeSemType'])){

	$s; $new;
	$sql = "SELECT status,acad_year,sem_type FROM current_state where dept_id='$dept_id'";
	$result = $conn->query($sql);                     
	while($row=$result->fetch_assoc()){		
		$s=$row["sem_type"];
	}

	if($s=="Odd")
		$new="Even";
	else
		$new="Odd";


	$sql = "UPDATE current_state SET sem_type='$new' where dept_id='$dept_id'";
	if ($conn->query($sql) === TRUE){

	} else{

	}

}

$sql = "SELECT status,acad_year,sem_type, start_time, end_time FROM current_state where dept_id='$dept_id'";
$result = $conn->query($sql);                     
while($row=$result->fetch_assoc()){
	$s=$row['status'];
	$acad_year=$row["acad_year"];
	$sem_type=$row["sem_type"];
	$start_time=$row["start_time"];
	$end_time=$row["end_time"];
	if($s==1){
		$status="End Sem Feedback Activated";
	}else{
		$status="Mid Sem Feedback Activated";
	}
}?>

<style type="text/css">
	#info {
		width: 80%;
		background-color: white;
		border: 1px solid black;
		border-radius: 0.7vw;
		margin: 2vw auto;
	}

	#info h2 {
		background-color: #800000;
		font-size: 1.5vw;
		font-weight: bold;
		color: white;
		padding: 2vw;
		margin-top: 0;
		margin-bottom: 0;
		border-top-right-radius: 0.7vw;
		border-top-left-radius: 0.7vw;
	}

	#info_table { 
		margin: 1vw auto;
		padding: 1vw;
	}

	#info_table td.norm {
		text-align: right;
		padding: 1vw; 
		font-family: Georgia, serif;
		color: #800000;
		font-weight: 1000;

	}
	.data{
		text-align: left;
		padding: 1vw;
		padding-left: 0;

		font-weight: 1000;
		color: #ff0000;
	}

</style>
<div id="info">
	<h2>System Status</h2><br>
	<table id="info_table">
		<tr>
			<td class="norm">Academic Year</td>
			<td class="data" contenteditable="true" id="acad_year"><?= $acad_year?></td>
			<td> <button id="status" onclick="changeAcadYear()">Update Academic Year</button></td>

		</tr>
		<tr>
			<td class="norm">Semester Type</td>
			<td class="data" contenteditable="true" id="sem_type"><?= $sem_type ?></td>
			<td> <button id="status" onclick="changeSemType()">Toggle Semester Type</button></td>

		</tr>
		<tr>
			<td class="norm">Current Status</td>
			<td class="data" id="current_status"><?= $status ?></td>
			<td> <button id="status" onclick="changeStatus()">Toggle Feedback type</button></td>

		</tr>
		<tr>
			<td class="norm">Start Time of the Form</td>
			<td class="data" id="start_time" contenteditable="true"><?= $start_time ?></td>
			<td> <button id="status" onclick="setStartTime()">Update Start Time</button></td>

		</tr>
		<tr>
			<td class="norm">End Time of the Form</td>
			<td class="data" id="end_time" contenteditable="true"><?= $end_time ?></td>
			<td> <button id="status" onclick="setEndTime()">Update End Time</button></td>

		</tr>
	</table>
</div>


