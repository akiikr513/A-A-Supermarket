 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:employeelogin.php");  

} else {  

?>  

<!doctype html>
<html>
<head>
<title>Stock</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="employeehome.php" align="right"> Home </a>|<a href="viewstock.php"> View Stock</a> | <a href="logout.php">Logout</a></i></b></div>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>STOCK</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>
</head>
<body STYLE="background:URL(images/abc.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:90% 95%">


<FORM METHOD="POST" action="" name="F">
<fieldset>
<legend> <marquee><h3><i>Stock Entry</i></h3> </marquee></legend>
<table border="5" cellpadding="10" cellspacing="10" >

<tr>
<TH align="left">ITEM ID</TH><TD> <INPUT TYPE="TEXT" PLACEHOLDER="Item id" NAME="ID"/></TD>
</tr>

<TR>
<TH align="left">ITEM NAME</TH> <TD> <INPUT TYPE="TEXT" PLACEHOLDER="Item name" NAME="NAME" /></TD>
</TR>


<tr align="left">
		 <td align="justify">TYPE</td>
		 <td align="justify">
		 	<select  id="TYPE" name="TYPE" >
				<option value=""> TYPE</option>
		 		<option value="home_personal_care">HOME AND PERSONAL CARE </option>
				<option value="dairy"> DAIRY</option>
				<option value="grocery"> GROCERY</option>
		 		
		 		<option value="bed_bath">BED & BATH</option>
		 		<option value="home_appliances">HOME APPLIANCES</option>
		 		<option value="Crockery">CROCKERY</option>
		 		
			</select>

		 </td></tr>


<TR>
<TH align="left">QUANTITY</TH> <TD> <INPUT TYPE="TEXT" PLACEHOLDER="Quantity" NAME="QTY" /></TD>
</TR>


<TR>
<TH align="left">PRODUCT PRICE</th>  <TD> <input type="TEXT" PLACEHOLDER="Price" NAME="price" /></TD>
</TR>

<TR>
<TH align="left">SUPPLIER ID</TH> <TD> <input type="TEXT" Name="SID">
 
</TD>
</TR>







</table>
<PRE>
                   <input type="reset" />	<input type="submit" value="Submit" name="submit" />
                     
</PRE>
</fieldset>
</FORM>

<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['ID']) && !empty($_POST['NAME']) && !empty($_POST['TYPE']) && !empty($_POST['QTY']) && !empty($_POST['price']) && !empty($_POST['SID'])) {  
    
$ID=$_POST['ID'];  
    
$NAME=$_POST['NAME'];  
  
    
$TYPE=$_POST['TYPE'];
$QTY=$_POST['QTY'];
$price=$_POST['price'];
$SID=$_POST['SID'];


$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT FROM stock WHERE Item_id='".$ID."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO stock(Item_id,Item_Name,Type,Quantity,Price,Supplier_Id) VALUES('$ID','$NAME','$TYPE','$QTY','$price','$SID')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Item Successfully Added In Stock!");
</script>

<?php
echo "Item Successfully Added"; 

 
} else {  

?>
<script type="text/javascript">
alert("Failed to add Item! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("That Item already exists! Please try again with another.");
</script>

<?php    
echo "That Item already exists! Please try again with another.";  
    
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