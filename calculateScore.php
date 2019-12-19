  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="60px;" style="text-align: center;">Faculty ID</th>
        <th width="80px;" style="text-align: center;">Faculty Name</th>
        
        <th width="80px;" style="text-align: center;">Detailed Report</th>
        <th width="80px;" style="text-align: center;">Save Report</th>
        <!--<th width="40px;"><input type="checkbox" id="source"onClick="toggle(this)" />Mail Report</th>-->
      </tr>



      <?php
      session_start();
      include ('../config/db_config.php');



      $f_id; $cname; $c_id; $fname; $lname;                
      if(isset($_SESSION['dept_id'])){
        $dept_id=$_SESSION['dept_id'];
      }else{
        $dept_id=$_POST['dept_id'];
      }





/*$s = "SELECT fname,lname from faculty where f_id='$f_id'";
$r= $conn->query($s);
while($res=$r->fetch_assoc()){
$fname=$res['fname'];
$lname=$res['lname'];
echo "Faculty Name: ".$fname." ".$lname."<br><br>";
$_SESSION['reportUser']=$fname." ".$lname;
}*/


  $t="SELECT * from faculty where dept_id='$dept_id'";
  $u= $conn->query($t);
  while($v=$u->fetch_assoc()):
   $f_id=$v['f_id'];
   $s = "SELECT fname,lname from faculty where f_id='$f_id'";
   $r= $conn->query($s);
   while($res=$r->fetch_assoc()){
    $fname=$res['fname'];
    $lname=$res['lname'];

  }?>
  <tr>
    <td id="f_id" style="text-align: center; font-size: 18px;"><?= $f_id ?></td>
    <td style="text-align: center; font-size:18px;"><?= $fname." ".$lname ?></td>


   <td style="text-align: center;"><button class="btn btn-danger" id="viewReport">View</button></td><td style="text-align: center;"><button class="btn btn-danger"id="downloadReport">Save</button></td><!--<td><input class="myCheckbox" name="myMail" type="checkbox" id="mailReport" onchange="toggleBack(this)"></td>--></tr>

    <?php
  endwhile;


?>

</thead>
</table>
