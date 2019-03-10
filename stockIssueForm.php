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
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/headerFooter.css">

<style>
body{
    max-width:100vw;
    overflow:hidden;
}
.enthead {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 70px);
  }
  .entbuttons {
    grid-column: 2/3;
    grid-row: 2/3;
    margin: auto;
  }
  .entmainndi {
    display: grid;
    height: 100vh;
    width: 100vw;
    grid-template-rows: 1fr minmax(500px, 550px) 1fr;
    grid-template-columns: 1fr minmax(500px, 600px) 1fr;
  }
  #entformarea {
    height:550px;
    display: grid;
    grid-row: 2/3;
    grid-column: 2/3;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(6, 1fr);
  }
  .entform-group {
    width: 250px;
    height: 10px;
  }
  .entform-group:nth-child(even) {
    grid-column: 2/3;
  }
  .entform-group:nth-child(odd) {
    grid-column: 1/2;
  }
  .entform-group:nth-child(9) {
    grid-column: 1/3;
    grid-row: 5/6;
    margin-left: auto;
    margin-right: auto;
  }
  #entformsubb {
    grid-row: 5/6;
    grid-column: 1/3;
    width: 200px;
    height: 38px;
    margin: auto;
  }
  .entactive {
    font-size: 20px;
  }
  .entbtn {
    width: 100px;
  }
  .entselect {
    width: 250px;
  }
  .entselect select {
    border: 2px solid #0069D9;
    color: #0069D9;
  }
  .entselect select:focus {
    border: 2px solid #0069D9;
    color: #0069D9;
  }
  .entselect select option {
    background: #fff;
    color: #0069D9;
  }
  legend{
    text-align: center;
    grid-column: 2/3;
  }
  @media screen and (max-width:768px){
  .enthead {
    display: grid;
    grid-template-columns: 1fr;
    width: 100%;
  }
  .entbuttons {
    grid-column: 1/2;
    margin: auto;
  }
  .entmainndi {
    display: grid;
    height: 100vh;
    width: 100vw;
    grid-template-rows: 1fr minmax(300px, 650px);
    grid-template-columns: 1fr minmax(300px, 500px) 1fr;
  }
  #entformarea {
    display: grid;
    grid-row: 2/3;
    grid-column: 2/3;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: repeat(8, minmax(85px,150px));
  }
  .entform-group {
    width: 250px;
    height: 10px;
  }
  .entform-group:nth-child(even) {
    grid-column: 2/3;
  }
  .entform-group:nth-child(odd) {
    grid-column: 2/3;
  }
  .entform-group:nth-child(9) {
    grid-column: 2/3;
    grid-row: 7/8;
    margin-left: auto;
    margin-right: auto;
  }
  #entformsubb {
    grid-row: 8;
    grid-column: 2/3;
    width: 200px;
    height: 38px;
    margin: auto;
  }
  .entactive {
    font-size: 20px;
  }
  .entbtn {
    width: 100px;
  }
  .entselect {
    width: 250px;
    grid-row: 6/7;
    grid-column: 2/3;
  }
  .entdept {
    grid-row: 7/8;
    grid-column: 2/3;
  }
  .entselect select {
    border: 2px solid #0069D9;
    color: #0069D9;
  }
  .entselect select:focus {
    border: 2px solid #0069D9;
    color: #0069D9;
  }
  .entselect select option {
    background: #fff;
    color: #0069D9;
  }
  legend{
    text-align: center;
    grid-column: 2/3;
  }
  }
  #timing{
      width:250px;
      margin:0;
  }

</style>

</head>
<body><!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand head" href="stockReceive.php?inventory=all">Store Management (STC)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bg-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Stock Entry
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="stockReceive.php?inventory=all">Stock Receive</a>
            <a class="dropdown-item bg-primary" href="stockIssue.php?inventory=all">Stock Issue</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Add New
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="addDepartment.php">Department</a>
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


<br>
<?php
$conn = mysqli_connect('localhost','root','','store_db');
$scheme=$_GET['scheme'];
$category=$_GET['category'];
$itemQry="SELECT * from items_objects where item='$category'";
$itemQryExe = mysqli_query($conn,$itemQry);
$inventoryName=mysqli_fetch_array($itemQryExe);
$inventory=$inventoryName['inventory'];
$unit=$inventoryName['unit'];
$balance=$inventoryName['balance'];

if(isset($_POST['issue'])){
    $timingIssue = $_POST['timingIssue'];
    $descriptionIssue = $_POST['descriptionIssue'];
    $issued = $_POST['issued'];
    $name = $_POST['remark'];
    $departments = $_POST['departments']; 
    $balanceAfterIssued = $balance - $issued ;
    $subqry="UPDATE items_objects SET balance = balance - '$issued' WHERE item='$category'";
    $issueQry = "INSERT into issued VALUES('','$timingIssue','$descriptionIssue','$category','$name','$issued','$unit','$departments','$scheme','$inventory')";
    $issueQryExe = mysqli_query($conn,$issueQry);
    $subQryExe = mysqli_query($conn,$subqry);
    if(!$issueQryExe){
      echo '<script>alert("Entry is not done try again")</script>';
    }
      else{
        echo '<script>alert("Entry is Submitted!")</script>';
        echo '<script>window.location.href ="stockIssue.php?inventory=all";</script> ';
      }
    }
?>

<form method="POST" id="form2">
    <fieldset>
    <div class="entmainndi">
      <legend >Issue Form</legend>
      <div id="entformarea">
        <div class="form-group entform-group">
          <label for="timing">Timing</label>
          <input type="date" class="form-control" id="timing" placeholder="Enter email" value="<?php echo date('Y-m-d'); ?>" name="timingIssue">
        </div>
       <div class="form-group entform-group">
          <label for="category">Category</label>
          <input type="text" class="form-control" id="category" name="category" value="<?php echo $_GET['category']; ?>" disabled>
        </div>
        <div class="form-group entform-group">
          <label for="descriptionI">Description</label>
          <input type="text" class="form-control" selected id="descriptionI" placeholder="Enter Description" name="descriptionIssue">
        </div>
        <div class="form-group entform-group">
          <label for="issued">Issued</label>
          <input type="text" class="form-control" id="issued" placeholder="Enter Issued" name="issued" onkeyup="compare(this)">
        </div>
        <div class="form-group entselect">
          <label for="unit">Select Unit</label>
          <input type="text" class="form-control" id="unit" name="runit" value="<?php echo $unit ?> " disabled>
        </div>
        <div class="form-group entform-group">
          <label for="balanceIssue">Balance</label>
          <input type="text" class="form-control" id="balanceIssue" placeholder="Enter Balance" name="balance" disabled="" value="<?php echo $balance; ?>">
        </div>
        <div class="form-group entform-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="remark">
        </div>

        <div class="form-group entselect entdept">
          <label for="department">Select Department</label>

          <select class="custom-select" id="department" name="departments">
        	<?php
        	$Department= "SELECT departmentName FROM department";
        	$departmentQry = mysqli_query($conn,$Department);
        	while($departmentFetch=mysqli_fetch_array($departmentQry)){
        		echo '<option value="'.$departmentFetch[0].'">'.$departmentFetch[0].'</option>';
        	}

        	?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary entbtn" id="entformsubb" name="issue">Submit</button>

      </div>
    </div></fieldset>
  </form>

</body>

</html>
<script>
 function compare(issueVal){
    var issueValue = parseInt(issueVal.value);
    var balanceValue = parseInt(document.getElementById('balanceIssue').value);
    if (issueValue>balanceValue){
      alert('Balance is set to ' + balanceValue +'. You have entered more than available Balance!');
      issueVal.value = balanceValue;
    }
  }
</script>