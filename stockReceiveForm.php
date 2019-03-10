<?php
session_start();
if(!(isset($_SESSION['name'])))
header('Location:index.php');
include './connection/connection.php';
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Management(STC)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Custom Stylesheet   -->
    <link rel="stylesheet" href="css/style.css" />
    <script>
    function splitVendor(gstCode){
    var res = gstCode.split("(")[1];
    var again = res.split(")")[0];
    // console.log(again);
    document.getElementById("gstNumber").value=again;
    }
    
    </script>
  </head>
<style>
  body{
    overflow-X:hidden;
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
    grid-row: 6/7;
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
    border:none !important;
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
          <a class="nav-link dropdown-toggle bg-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Stock Entry
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-primary" href="stockReceive.php?inventory=all">Stock Receive</a>
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
if(isset($_POST['receive'])){
  $timing = $_POST['timing1'];
  $bill = $_POST['billNumber'];
  $gst=$_POST['gst'];
  $amount = $_POST['amount1'];
  $gstNumber = $_POST['gstNumber'];
  $taxableValue = ($amount/(100+$gst)*100);
  $description = $_POST['vendor'];
  $received = $_POST['received1'];
  $addqry="UPDATE items_objects SET balance = balance + '$received' WHERE item='$category'";
  $qry ="INSERT INTO received VALUES('','$timing','$bill','$description','$gstNumber','$category','$amount','$gst".'%'."','$taxableValue','$received','$unit','$scheme','$inventory')";
  $ins = mysqli_query($conn,$qry);
  $add = mysqli_query($conn,$addqry);
  if(!$ins){
    echo '<script>alert("Entry is not done try again")</script>';
  }
  else{
    echo '<script>alert("Entry is Submitted!")</script>';
  	echo '<script>window.location.href ="stockReceive.php?inventory=all";</script> ';
  }
}
?>
<form method="POST" id="form1">
    <div class="entmainndi">
      <legend >Receive Form</legend>
      <div id="entformarea">
        <div class="form-group entform-group">
          <label for="timing">Timing</label>
          <input type="date" pattern="" class="form-control" id="timing" placeholder="Enter email" value="<?php echo date('Y-m-d'); ?>" name="timing1">
        </div>
   <div class="form-group entform-group">
          <label for="category">Category</label>
          <input type="text" class="form-control" id="category" name="category" value="<?php echo $_GET['category']; ?>" disabled>
        </div>
        <div class="form-group entselect">
          <label for="unit">Select Unit</label>
          <input type="text" class="form-control" id="unit" name="runit" value="<?php echo $unit ?> " disabled>
        </div>
        <div class="form-group entselect">
          <label for="vendor">Vendor's list</label>
          <select onload="splitVendor(this.options[this.selectedIndex].text)" onchange="splitVendor(this.options[this.selectedIndex].text)" class="custom-select" style="border:1px solid #ced4da !important;" selected name="vendor" id="vendor">
        <?php
        $getVendor= "SELECT * FROM vendor";
        $getVendorQuery = mysqli_query($conn,$getVendor);
        $gstNumb="";
        $count=0;
        while($getVendorInfo = mysqli_fetch_array($getVendorQuery)){
            echo ' <option value="' .$getVendorInfo[1].'">'.$getVendorInfo[1].' (' .$getVendorInfo[2].')</option> ';
            if($count<1){
              $gstNumb=$getVendorInfo[2];
              $count++;
            }
          }
        ?>
        </select>
        </div> 
        <div class="form-group entform-group">
          <label for="bill">Bill Number</label>
          <input type="text" class="form-control" id="bill" placeholder="Enter Bill Number" name="billNumber">
        </div>
        <div class="form-group entform-group">
          <label for="amount">Amount</label>
          <input type="text" class="form-control" id="amount" placeholder="Enter Amount" name="amount1" onkeyup="calcutax()" >
        </div>
        <div class="form-group entform-group">
          <label for="gst">G.S.T (in %)</label>
          <select class="custom-select" style="border:1px solid #ced4da !important;" id="gst" name="gst" onchange="calcutax()">
            <option value="0" selected="">No G.S.T</option>
            <option value="5">5%</option>
            <option value="12">12%</option>
            <option value="18">18%</option>
            <option value="28">28%</option>
          </select>
        </div>
        <div class="form-group entform-group">
          <label for="netValue">Taxable Value</label>
          <input type="text" name="tax" id="netValue" class="form-control" disabled placeholder="Enter Amount to get this value" >
        </div>
        <div class="form-group entform-group">
          <label for="received">Received</label>
          <input type="text" class="form-control" id="received" placeholder="Enter Received" name="received1">
        </div>
        <button type="submit" class="btn btn-primary entbtn" id="entformsubb" name="receive">Submit</button>
        <input type="text" hidden class="form-control" id="gstNumber" name="gstNumber" value="<?php echo $gstNumb; ?>">
      </div>
    </div>
  </form>
</body>
</html>


<script type="text/javascript">
  function Receive() {
    document.getElementById("form1").style.display = "block";
    document.getElementById("form2").style.display = "none";
    $("#receieve").addClass("entactive");
    $("#issue").removeClass("entactive");
  }
  function Issue() {
    document.getElementById("form1").style.display = "none";
    document.getElementById("form2").style.display = "block";
    $("#issue").addClass("entactive");
    $("#receieve").removeClass("entactive");
  }
    function calcutax(){
    var amount=parseInt(document.getElementById('amount').value);
  
  
    var gst=parseInt(document.getElementById('gst').value);
    var gstTax = 100 + gst;
    var taxableValue = (amount / gstTax)* 100;
    var netValue = document.getElementById('netValue').value;
    netValue = taxableValue.toFixed(2);
      if(netValue=="NaN"){
      document.getElementById('netValue').value = 0;  
    }
    else{
      document.getElementById('netValue').value = netValue; 
    }
}
  function compare(issueVal){
    var issueValue = parseInt(issueVal.value);
    var balanceValue = parseInt(document.getElementById('balanceIssue').value);
    if (issueValue>balanceValue){
      alert('Balance is set to ' + balanceValue +'. You have entered more than available Balance!');
      issueVal.value = balanceValue;
    }
  }
</script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- end of javascript files -->
