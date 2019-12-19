<?php
session_start();
include ('../config/db_config.php');

$roll_no; $fname; $lname;                
if(isset($_SESSION['dept_id'])){
  $dept_id=$_SESSION['dept_id'];
}
else{
  $dept_id=$_POST['dept_id'];
}
$sql = "SELECT acad_year from current_state";
$res = $conn->query($sql);                     
while($r=$res->fetch_assoc()){ 
  $acad_year=$r['acad_year'];
}
?>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/table_style.css">
<b style="font-size: 20px;">Following students have not given feedback yet</b><br><br>
<table class="table table-bordered" id="myTable2">
  <thead>
    <tr>
      <th width="100px;">Student Roll No</th>
      <th width="200px;">Student Name</th>
      <th width="100px;"><input type="checkbox" id="source"onClick="toggle2(this)" />Reminder Mail</th>
    </tr>




    <?php

    $t="SELECT * from student where dept_id='$dept_id' and flag=0 and acad_year='$acad_year'";
    $u= $conn->query($t);
    while($v=$u->fetch_assoc()):
     $roll_no=$v['roll_no'];

     $fname=$v['fname'];
     $lname=$v['lname'];



     ?>
     <tr>
      <td id="roll_no"><?= $roll_no ?></td>
      <td><?= $fname." ".$lname ?></td>
      <td><input type="checkbox" id="source"onClick="toggleBack2(this)" name="myMail2" /></td>
    </tr>

    <?php 

  endwhile; 

  ?>
</thead>
</table>
