<?php
session_start();
if(!(isset($_SESSION['name'])))
header('Location:index.php');
include './connection/connection.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/headerFooter.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
  <style type="text/css">
  body{
      overflow:hidden;
  }
    .departmentcont{
      display: grid;
      grid-template-rows: minmax(150px,auto) 1fr auto 1fr 1fr;
      grid-template-columns: 1fr minmax(150px,300px) 1fr minmax(150px,300px) 1fr;
    }
    .deptcontent1{
      display: grid;
      grid-column: 2/3;
      grid-row: 2/3;
    }
    .deptcontent2{
      display: grid;
      grid-column: 4/5;
      grid-row: 2/3;
    }
    .addSchemeDept{
      display: grid;
      grid-template-columns: 1fr 1fr;
    }
    .btnCustom{
        height:35px;
    }
  </style>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand head" href="stockReceive.php?inventory=all">Store Management (STC)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Stock Entry
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="stockReceive.php?inventory=all">Stock Receive</a>
            <a class="dropdown-item " href="stockIssue.php?inventory=all">Stock Issue</a>
          </div>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            View Stock
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="viewReceived.php">Stock Received</a>
            <a class="dropdown-item" href="#">Stock Issued</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">All Stock</a>
          </div>
        </li>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bg-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Add New
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-primary" href="addDepartment.php">Department</a>
            <a class="dropdown-item" href="addItem.php">Item</a>
            <a class="dropdown-item" href="addScheme.php">Scheme</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="addVendor.php">Vendor</a>
          </div>
        </li>
        <a class="nav-item nav-link" href="viewReceived.php">View Bills</a>
        <a class="nav-item nav-link" href="help.html">Help</a>
        <a class="nav-item nav-link" href="destroy.php">LogOut</a>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
   <form method="post">
  <div class="departmentcont">
    <div class="deptcontent1">
        <div class="form-group">
                <label for="addDepartment"><h4>Add Department</h4></label>
                <input type="text" class="form-control" id="addDepartment" placeholder="Enter Department" name="departmentEnter" >
          </div>
          <button type="submit" class="btn btn-primary btnCustom" name="deptsubmit">Submit</button>
      </div>
      <div class="deptcontent2">

<?php
if (isset($_POST['deptsubmit'])) {
$departmentEnter=$_POST['departmentEnter'];
$deptfetch="SELECT * from department";
$exedeptfetch=mysqli_query($conn,$deptfetch);
$deptqry= "INSERT into department values('','$departmentEnter')";
$check=mysqli_query($conn,$deptqry);
if($check){
  echo '<script>alert("Department Added")</script>';
}
}
?>
<br>
<label for="department"><h5>Available Departments</h4></label>
<select class="custom-select" id="department" size=6>';
<?php
$deptfetch="SELECT * from department";
$exedeptfetch=mysqli_query($conn,$deptfetch);
while ($datadept=mysqli_fetch_array($exedeptfetch)) {
echo '<option value="'.$datadept[1].'">';
echo $datadept[1];
echo "</option>";
}
?>
</select>
      </div>
    </div>
  </form>
</div>
<br>
<br>
<br>
<br>

<script>
// function warning(warn) {
//   alert('You can not delete or update data or scheme. Be careful while entering this data!');
// }
// // function blankCheck(){
// // 	if(document.getElementById('addDepartment').value == "" ){
// // 		alert('You can not submit empty Entry!');
// // 		return false;
// // 	}
//   function blankCheckScheme(){
// 	if(document.getElementById('schedepartmentEntermeWarn').value == "" ){
// 		alert('You can not submit empty Entry!');
// 		return false;
// 	}
// }
// }
// }
</script>
</body>
</html>