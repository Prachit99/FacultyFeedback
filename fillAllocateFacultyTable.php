
<?php
session_start();
$section=$_POST['section'];
$class=$_POST['class'];
if(isset($_SESSION['dept_id'])){
  $dept_id=$_SESSION['dept_id'];
}else{
  $dept_id=$_POST['dept_id'];
}

include ('../config/db_config.php');

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
<link rel="stylesheet" type="text/css" href="../styles/dept_cood_dashboard_style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<table id="2" class="table table-bordered">
  <thead>
    <tr>
      <th style="text-align: center;">Course Code</th>
      <th style="text-align: center;">Course Name</th>
      <th style="text-align: center;">Faculty Name</th>
      <th style="text-align: center;">Actions</th>
    </tr>
    <?php 
    $f_name;
    $sql = "SELECT course_code,f_id FROM courses_faculty where dept_id='$dept_id' and class='$class' and section_or_batch ='$section' and acad_year='$acad_year'";
    $result = $conn->query($sql);                     
    while($row=$result->fetch_assoc()):
      if($row['f_id'] == 0){
        $temp="Not Assigned";
        $f_name="Not Assigned";
      }else{
        $temp=$row['f_id'];
        $sql3="SELECT fname,lname from faculty where f_id='$temp'";
        $res2=$conn->query($sql3);
        while($r2=$res2->fetch_assoc()){
          $f_name=$r2['fname']." ".$r2['lname'];
        }

      } 
      $temp2=$row['course_code'];
      $sql2="SELECT c_name from subject where course_code='$temp2' and acad_year='$acad_year'";
      $res=$conn->query($sql2);
      while($r=$res->fetch_assoc()){
        $c_name=$r['c_name'];
      }
      
      

      ?>
      
      <tr>
        <td id="c_id"><?= $temp2 ?></td>
        <td id="c_name"><?= $c_name ?></td>
        <td id="f_id"><?= $f_name ?></td>

        
        <td>  <a id="add2"class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
          <a id="edit2"class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
          <a id="delete2"class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
        </tr>                    
      <?php endwhile; ?>
    </thead>

    <tbody>


    </tbody>
  </table>