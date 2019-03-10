<?php
$conn = mysqli_connect('localhost','root','','store_db');
if(!$conn){
    echo '<script>alert("Connection Failure")</script>';    
}
?>