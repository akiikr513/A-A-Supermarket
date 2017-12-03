<?php
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");
if(isset($_GET['Supplier_Id'])){  
 
$sql="SELECT Supplier_Name FROM supplier WHERE Supplier_Id='r'"; 

$result=mysqli_query($con,$sql); 
echo($result);
?>