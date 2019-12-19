
<?php
session_start();


if(isset($_SESSION['dept_id'])){
  $dept_id=$_SESSION['dept_id'];
}else{
  $dept_id=$_POST['dept_id'];
}

include ('../config/db_config.php');



?>


<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../styles/dept_cood_dashboard_style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<table id="stu_4" class="table table-bordered" style="overflow-x:auto;">
  <thead>
    <tr>
      <th width="80vw">Roll no</th>
      <th width="100vw">First Name</th>
      <th width="100vw">Middle Name</th>
      <th width="100vw">Last Name</th>
      <th width="220vw">Email ID</th>
      <th width="80vw">Password</th>
      <th width="50vw">Class</th>
      <th width="50vw">Sem</th>
      <th width="50vw">Div</th>
      <th width="50vw">Batch</th>
      <th width="50vw">ElectiveID</th>
      <th width="60vw">ElectiveBatchID</th>
      <th width="50vw">Actions</th>
    </tr>
    <?php 

    $sql = "SELECT * FROM student where dept_id='$dept_id'";
    $result = $conn->query($sql);                     
    while($row=$result->fetch_assoc()): ?>
      
      <tr>
        <td width="80vw" id="stu_roll_no"><?= $row['roll_no'] ?></td>
        <td width="100vw"id="stu_fname"><?= $row['fname'] ?></td>
        <td width="100vw"id="stu_mname"><?= $row['mname'] ?></td>
        <td width="100vw"id="stu_lname"><?= $row['lname'] ?></td>
        <td width="220vw" id="stu_email"><?= $row['email'] ?></td>
        <td width="80vw"id="stu_password"><?= $row['pass'] ?></td>
        <td width="50vw" id="stu_class"><?= $row['class'] ?></td>
        <td width="50vw"id="stu_sem"><?= $row['sem'] ?></td>
        <td width="50vw" id="stu_section"><?= $row['section'] ?></td>
        <td width="50vw" id="stu_batch"><?= $row['batch'] ?></td>
        <td width="50vw" id="stu_electiveID"><?= $row['electiveID'] ?></td>
        <td width="50vw" id="stu_electiveBatchID"><?= $row['electiveBatchID'] ?></td>
        <td>  <a id="add4"class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
          <a id="edit4"class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
          <a id="delete4"class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
        </tr>                    
      <?php endwhile; ?>
    </thead>

    <tbody>
      
      
    </tbody>
  </table>
  