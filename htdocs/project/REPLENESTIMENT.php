 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

?>  


<!doctype html>
<html>
<head>

<title>REPLENESTIMENT</title>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="adminhome.php" align="right"> Home </a>|<a href="abc.php"> View Stock</a> |<a href="logout.php">Logout</a></i></b></div>
<br><br>
<center>
	<h1> <u> <strong><font color="rosybrown"> STOCK REPLENESHMENT</font></strong></u></h1>
</center>

</head>
<body bgcolor="ivory" leftmargin="50" rightmargin="100" topmargin="20" bottommargin="50">
<FORM METHOD="POST" action="" name="F">
<fieldset>
<legend> <marquee><h3><i>Stock Replenishment Request</i></h3> </marquee></legend>

<table align="center" border="5"  cols="7" cellpadding="4" cellspacing="4" hspace="20" vspace="20">
	
			
			
				<tr align="justify">
				<td align="justify" >REQUEST ID</td>
				<td align="justify"  ><input  name="REQUEST_ID" placeholder="Requst id" type="text"></td>
				</tr>
				
				<tr align="justify">
				<td align="justify" >SUPPLIER ID</td>
				<td align="justify"  ><input name="SUPPLIER_ID" placeholder="Supplier id" type="text"></td>
				</tr>
				
				
				
				<tr align="justify">
				<td align="justify" >DATE</td>
				<td align="justify" ><input name="DATE" placeholder="mm/dd/yyyy" type="date"></td>
				</tr>
				
				<tr align="justify">
				<td align="justify" >TYPE</td>
				<td align="justify" ><select  id="TYPE" name="TYPE"  >
				<option value="" >     </option>
		 		<option value="home_personal_care">HOME AND PERSONAL CARE </option>
				<option value="dairy"> DAIRY</option>
				<option value="grocery"> GROCERY</option>
		 		
		 		<option value="bed_bath">BED & BATH</option>
		 		<option value="home_appliances">HOME APPLIANCES</option>
		 		<option value="Crockery">CROCKERY</option>
		 		
				</select></td>
				</tr>

				<tr align="justify">
				<td align="justify" >ITEM ID</td>
				<td align="justify" ><input name="ITEM_ID" placeholder="Item Id" type="text"></td>
				</tr>
				
				<TR align="justify">
				<td align="justify">QUANTITY REQUIRED</td> 
				<TD align="justify"> <INPUT TYPE="TEXT" NAME="QTY" placeholder="Quantity Required"/></TD>
				</TR>

				<tr align="justify">
				<td align="justify" colspan="2" ><center><input align="middle" type="submit" value="Submit" name="submit"> </center></td>
				</tr>
				

			
			
			
		
</table>  <br>
<br>
</fieldset>
</FORM>
<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['REQUEST_ID']) && !empty($_POST['SUPPLIER_ID'])  && !empty($_POST['DATE']) && !empty($_POST['TYPE']) && !empty($_POST['ITEM_ID']) && !empty($_POST['QTY'])) {  
    
$REQUEST_ID=$_POST['REQUEST_ID'];  
    
$SUPPLIER_ID=$_POST['SUPPLIER_ID'];  
  
    

$DATE=$_POST['DATE'];
$TYPE=$_POST['TYPE'];
$ITEM_ID=$_POST['ITEM_ID'];
$QTY=$_POST['QTY'];

$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM replenishment WHERE Request_Id='".$REQUEST_ID."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO replenishment(Request_Id,Supplier_ID,Date,Type,Item_id,Qty) VALUES('$REQUEST_ID','$SUPPLIER_ID','$DATE','$TYPE','$ITEM_ID','$QTY')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Request Has Been Successfully Made!");
</script>

<?php
echo "Request Has Been Made"; 

 
} else {  

?>
<script type="text/javascript">
alert("Failed to send request! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("Request has been already send for this Item! Please try again with another.");
</script>

<?php    
echo "Request has been already send for this Item! Please try again with another.";  
    
}  
  

} else { 
?>
<script type="text/javascript">
alert("All fields are required!");
</script>

<?php  
    
echo "All fields are required!";  

}  

}  

?> 


</body>

</html>
<?php
  

}  


?> 