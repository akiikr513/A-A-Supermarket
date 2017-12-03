<?php   

session_start();  


if(!isset($_SESSION["sess_user"])){  
    

header("location:employeelogin.php");  


} else {  


?> 

<!doctype html>
<html>
<head>
<title>In_Stock</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 1000px;"><b><i><a href="employeehome.php" align="right"> Home </a>| <a href="logout.php">Logout</a></i></b></div>

<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>Stock Items</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>
</head>
<body bgcolor="ivory">
<fieldset>
<legend> <marquee><h3><i>Items In Stock</i></h3> </marquee></legend>
<center><table width="500" cellpadding="5" cellspacing="5" border="5">
<tr>
<th>ITEM ID </th><th> ITEM NAME</th><th> TYPE</th><th> PRICE </th><th> SUPPLIER </th><th> QUANTITY</th>
</tr>
<?php
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!"); 
$result=mysqli_query($con,"SELECT * FROM stock");

while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row['Item_id']; ?></td>
<td><?php echo $row['Item_Name']; ?></td>
<td><?php echo $row['Type']; ?></td>

<td><?php echo $row['Price']; ?></td>
<td><?php echo $row['Supplier_Id']; ?></td>
<td><?php echo $row['Quantity']; ?></td>

</tr>
<?php
}
?>
</table></center>
</fieldset>
</body>
</html>

<?php  


}  


?> 
