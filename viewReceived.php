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
  <title>Store Management Data</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/storeFetch.css">
  <link rel="stylesheet" type="text/css" href="Table/Datafetch.css">
<!-- tablescripts -->
  <script type="text/javascript" language="javascript" src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.select.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="Table/dataTables.editor.min.js"></script> 
  <script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  $('#viewAll').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'excel',
          'pdf',
          'print',
        ]
  } );
    $('#viewReceived').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'excel',
          'pdf',
        ]
  } );
    $('#viewIssued').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'excel',
          'pdf',
        ]
  } );
} );
</script>
<!-- // tablescripts end -->

<style type="text/css">
  .fa,.fa-trash {
    font-size:20px;
  }
</style>
  <!-- // tablestyles -->
</head>
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
        <a class="nav-item nav-link  bg-primary" href="viewReceived.php">View Bills</a>
        <a class="nav-item nav-link" href="help.html">Help</a>
        <a class="nav-item nav-link" href="destroy.php">LogOut</a>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="masterFetch">
    <div class="enthead">
      <div class="entbuttons">
        <button onclick="allData()" class="btn btn-primary entbtn entactive" id="allData">All Data</button>
        <button onclick="receive()" type="submit" name="dataReceived" class="btn btn-primary entbtn" id="receive">Received</button>
        <button onclick="issue()" type="submit" name="dataIssued" class="btn btn-primary entbtn" id="issue">Issued</button>
      </div>
    </div>
    
    <form action="" method="POST">
    <div class="fetchContAll" id="fetchContAll">
      <div class="deptcontent2">
        <label for="category">Select Category</label>
      <select id="category" class="custom-select" name="categorySelect">
      <?php
      $deptfetch="SELECT item from items_objects";
      $exedeptfetch=mysqli_query($conn,$deptfetch);
      while ($datadept=mysqli_fetch_array($exedeptfetch)) {
      echo '<option value="'.$datadept[0].'">';
      echo $datadept[0];
      echo "</option>";
      }
      ?>
      </select>
        </div>
        <div class="buttonSub m-auto">
          <button type="submit" class="btn btn-primary entbtn" id="entformsubb" name="viewAll">View</button>
          <span>Press View to see data</span>
        </div>
    </form>
       
 <div class="tableView">
  <div class="tableGridContent">
  <table id="viewAll" class="table table-striped table-bordered">
<?php
echo <<< EOD
        <thead style="font-weight:none;font-size:15px;">
					<tr>
						<th>Id</th>
						<th>Timing</th>
						<th>Bill Number</th>
						<th>Vendor</th>
						<th>GST Number</th>
						<th>Category</th>
						<th>Amount</th>
						<th>GST %</th>
						<th>Taxable Value</th>
						<th>Received</th>
						<th>Issued</th>
						<th>Unit</th>
						<th>Department</th>
						<th>Name</th>
						<th>Inventory</th>
						<th>Scheme</th>
					</tr>
        </thead>
        <tbody>
EOD;

// All data fetch included receive and issued.
if(isset($_POST['viewAll'])){
$cate=$_POST['categorySelect'];
$viewReceive="SELECT * FROM received WHERE category ='$cate'";
$viewIssue="SELECT * FROM issued WHERE category='$cate'";
$viewReceiveQry= mysqli_query($conn,$viewReceive);
$viewIssueQry= mysqli_query($conn,$viewIssue);
// php for issue
while($viewIssueFetch=mysqli_fetch_array($viewIssueQry)){
echo '<tr>
	<td>'.$viewIssueFetch["id"].'</td>
	<td>'.$viewIssueFetch["timing"].'</td>
	<td>--</td>
	<td>'.$viewIssueFetch["description"].'</td>
  <td>--</td>
  <td>'.$viewIssueFetch["category"].'</td>
	<td>--</td>
	<td>--</td>
	<td>--</td>
	<td>--</td>
	<td>'.$viewIssueFetch["issued"].'</td>
	<td>'.$viewIssueFetch["unit"].'</td>
	<td>'.$viewIssueFetch["department"].'</td>
	<td>'.$viewIssueFetch["name"].'</td>
	<td>'.$viewIssueFetch["inventory"].'</td>
	<td>'.$viewIssueFetch["scheme"].'</td>
	</tr>	';
}
// php for receive
while($viewReceiveFetch=mysqli_fetch_array($viewReceiveQry)){
echo '<tr>
	<td>'.$viewReceiveFetch["id"].'</td>
	<td>'.$viewReceiveFetch["timing"].'</td>
	<td>'.$viewReceiveFetch["billNumber"].'</td>
	<td>'.$viewReceiveFetch["vendor"].'</td>
	<td>'.$viewReceiveFetch["gstNumber"].'</td>
	<td>'.$viewReceiveFetch["category"].'</td>
	<td>'.$viewReceiveFetch["amount"].'</td>
	<td>'.$viewReceiveFetch["gst"].'</td>
	<td>'.$viewReceiveFetch["taxableValue"].'</td>
	<td>'.$viewReceiveFetch["received"].'</td>
	<td>--</td>
	<td>'.$viewReceiveFetch["unit"].'</td>
	<td>--</td>
	<td>--</td>
	<td>'.$viewReceiveFetch["inventory"].'</td>
	<td>'.$viewReceiveFetch["scheme"].'</td>
	</tr>	';	
}
	echo '</tbody>';
}
?>
</table>
  </div>
   </div>

<!-- This is the end of content for all data fetch -->
 </div>


<div class="fetchContReceive" id="fetchContReceive">
    <div class="viewReceived">
      <table id="viewReceived" class="table table-striped nowrap table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Timing</th>
            <th>Bill Number</th>
            <th>Description</th>
            <th>GST Number</th>
            <th>Category</th>
            <th>Amount</th>
            <th>GST</th>
            <th>Taxable Value</th>
            <th>Received</th>
            <th>Unit</th>
            <th>Scheme</th>
            <th>Inventory</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
<?php 
$queryReceive="SELECT * from received";
$exequery=mysqli_query($conn,$queryReceive);
while ($receiveData=mysqli_fetch_array($exequery)) {
  echo '<tr>
  <td>'.$receiveData[0].'</td>
  <td>'.$receiveData[1].'</td>
  <td>'.$receiveData[2].'</td>
  <td>'.$receiveData[3].'</td>
  <td>'.$receiveData[4].'</td>
  <td>'.$receiveData[5].'</td>
  <td>'.$receiveData[6].'</td>
  <td>'.$receiveData[7].'</td>
  <td>'.$receiveData[8].'</td>
  <td>'.$receiveData[9].'</td>
  <td>'.$receiveData[10].'</td>
  <td>'.$receiveData[11].'</td>
  <td>'.$receiveData[12].'</td>
  <td><a href=?recId='.$receiveData[0].'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>';
}
?>
        </tbody>
      </table>
</div>
</div>
<?php
if (isset($_GET['recId'])) {
$recId=$_GET['recId'];
$delqry1="DELETE from received where id='$recId'";
mysqli_query($conn,$delqry1);
echo '<script>window.location.href="viewReceived.php";</script>';
}
?>
<div class="fetchContIssue" id="fetchContIssue">
  <div class="viewIssued">
      <table id="viewIssued" class="table table-striped nowrap table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Timing</th>
            <th>Description</th>
            <th>Category</th>
            <th>Name</th>
            <th>Issued</th>
            <th>Unit</th>
            <th>Department</th>
            <th>Scheme</th>
            <th>Inventory</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
<?php 
$queryIssue="SELECT * from issued";
$exequery=mysqli_query($conn,$queryIssue);
while ($IssueData=mysqli_fetch_array($exequery)) {
  echo '<tr>
  <td>'.$IssueData[0].'</td>
  <td>'.$IssueData[1].'</td>
  <td>'.$IssueData[2].'</td>
  <td>'.$IssueData[3].'</td>
  <td>'.$IssueData[4].'</td>
  <td>'.$IssueData[5].'</td>
  <td>'.$IssueData[6].'</td>
  <td>'.$IssueData[7].'</td>
  <td>'.$IssueData[8].'</td>
  <td>'.$IssueData[9].'</td>
  <td><a href=?issId='.$IssueData[0].'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>';
}
?>
        </tbody>
      </table>
</div>
</div>
<?php
if (isset($_GET['issId'])) {
$issId=$_GET['issId'];
$delqry2="DELETE from issued where id='$issId'";
mysqli_query($conn,$delqry2);
echo '<script>window.location.href="storefetch.php";</script>';
}
?>





<!-- masterdiv close -->
</div>
<!-- masterdiv close -->





<script type="text/javascript">
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "none";
  function allData(){
    document.getElementById("fetchContAll").style.display = "grid";
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "none";
    $('#allData').addClass('entactive');
    $('#receive').removeClass('entactive');
    $('#issue').removeClass('entactive');
  }
  function receive() {
    document.getElementById("fetchContAll").style.display = "none";
    document.getElementById("fetchContReceive").style.display = "grid";
    document.getElementById("fetchContIssue").style.display = "none";
    $("#receive").addClass("entactive");
    $('#allData').removeClass('entactive');
    $("#issue").removeClass("entactive");
  }
  function issue() {
    document.getElementById("fetchContAll").style.display = "none";
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "grid";
    $("#issue").addClass("entactive");
    $("#receive").removeClass("entactive");
    $('#allData').removeClass('entactive');
  }
    
</script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
