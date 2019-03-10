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
  <style>
  body{
    overflow:hidden;
  }
  .schselect select{
            border: 2px solid #0069D9;
            color: #0069D9;
        }
        .schselect select:focus{
            border: 2px solid #0069D9;
            color: #0069D9;
        }
        .schselect select option{
            background: #fff;
            color: #0069D9;
        }
        .custom-select{
          border:2px solid #0069D9;
        }
	.concont{
		display: grid;
		height: 100vh;
		width: 100vw;
		grid-template-rows: auto 1fr;
	}
	.conbar{
		display: grid;
		grid-template-columns: repeat(5,auto);
		justify-content:  center;
	}
	.concontent-item{
		display: grid;
		grid-template-columns: 1fr 1fr;
	}
	.concontent-item-enter{
		display: grid;
		grid-template-columns:1fr minmax(auto,auto) 1fr;
		grid-template-rows: 1fr minmax(auto,auto) 1fr;	
	}
	.concontent-item-enter-data{
		display: grid;
		grid-template-rows: repeat(5, auto);
		grid-column: 2/3;
		grid-row: 2/3;
	}
	.consubb{
		height: 38px;
	}
	.concontent-item-fetch{
		display: grid;
	}
	.concontent-item-fetch-data{
		display: grid;
    grid-template-rows: repeat(6, auto);
    grid-template-columns: minmax(100px,275px) ;
		grid-column: 2/3;
    grid-row: 2/3;
    overflow:hidden;
	}
  .centerd{
    height:auto;
    width:auto;
    position :relative;
    left:40%;
    top:20%;
  }
	@media screen and(max-width: 768px){
		.concontent-item{
		display: grid;
		grid-template-columns: 1fr ;
	}	
	.concontent-item-fetch{
		display: grid;
  }
  .centerd{
    height:auto;
    width:auto;
    position :relative;
    left:0;
    top:20%;
  }
  }
  .heading{
    margin-left:41%;
}
  </style>
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
          <a class="nav-link dropdown-toggle bg-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Stock Entry
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-primary" href="stockReceive.php?inventory=all">Stock Receive</a>
            <a class="dropdown-item" href="stockIssue.php?inventory=all">Stock Issue</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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

<h3 class="heading">Stock Receiving Entry</h3>
<div class="centerd">
<div class="concontent-item-fetch"></div>
	<div class="concontent-item-fetch-data">


	<div class="btn-group btn-group-toggle" data-toggle="buttons" style="height:38px;">
		<label class="btn btn-secondary">
			<input type="radio" name="options" onchange="flitertheitem(this)" value="all">All
		</label>
		<label class="btn btn-secondary">
			<input type="radio" name="options" onchange="flitertheitem(this)" value="assets">Assets
		</label>
		<label class="btn btn-secondary">
			<input type="radio" name="options" onchange="flitertheitem(this)" value="stationary">Stationary
		</label>
		<label class="btn btn-secondary">
			<input type="radio" name="options" onchange="flitertheitem(this)" value="stock">Stock
		</label>
	</div>
    <script type="text/javascript">
	function flitertheitem(itemradio){
		var a=itemradio.value;
		window.location.replace('stockReceive.php?inventory='+a);
	}
	</script>
    <div class="form-group">
    <?php
if (isset($_GET['inventory'])) {
    $qry = "SELECT * from items_objects ORDER BY item";
    $setInventory = 'All';
    $fetchInventory = $_GET['inventory'];
    if ($fetchInventory == 'all') {
        $qry = "SELECT * from items_objects ORDER BY item";
        $setInventory = 'All';}
    if ($fetchInventory == 'stock') {
        $qry = "SELECT * from items_objects where inventory='stock' ORDER BY item";
        $setInventory = 'Stock';}
    if ($fetchInventory == 'assets') {
        $qry = "SELECT * from items_objects where inventory='assets' ORDER BY item";
        $setInventory = 'Asset';}
    if ($fetchInventory == 'stationary') {
        $qry = "SELECT * from items_objects where inventory='stationary' ORDER BY item";
        $setInventory = 'Stationary';}
    echo '<label for="">Select the Inventory below(' . $setInventory . ')</label>';
    echo '<select class="custom-select" name="itemcate" id="sentItem">';
    $exe = mysqli_query($conn, $qry);
    while ($data = mysqli_fetch_array($exe)) {
        echo '<option value="' . $data[1] . '">';
        echo $data[1];
        if ($fetchInventory == 'all') {
            echo '  (' . $data[3] . ')';
        }
        echo "</option>";
    }
}
?>
      </select>
			</div>
			<form name="schemeform">
		  <div class="schcont">
			<div class="schcontents">
			<div class="schscheme">Select Scheme</div>
      </div>
      </div>
      <div class="schselect" >
			<select name="schsch" class="custom-select" id="schemeOfItem">
            <?php
$scheme = "SELECT schemeName FROM scheme";
$schemeQry = mysqli_query($conn, $scheme);
while ($schemeFetch = mysqli_fetch_array($schemeQry)) {
    echo '<option value="' . $schemeFetch[0] . '">' . $schemeFetch[0] . '</option>';
}
?>
            </select>
	          </div>
	          </form>
	          <br>
	    	    <div class="btm schsubb">
            <a href="" id="url">
            <button type="button" class="btn btn-primary btn-lg" onclick="return myscheme()">Receive</button></a>
            </div>
            </div>
            </div>
            </div>

<script>
    function myscheme(){
            var scheme=document.getElementById('schemeOfItem').value;
            var sentItem = document.getElementById('sentItem').value;
            document.getElementById('url').href='stockReceiveForm.php?scheme='+scheme+'&category='+sentItem;
            if(document.getElementById('sentItem').value == ""){
              alert('Please Select Category');
              return false;
            }}
</script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- end of javascript files -->

  </body>
</html>
