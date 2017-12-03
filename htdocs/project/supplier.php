 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

?>  

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SUPPLIER FORM</title>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="adminhome.php" align="right"> Home </a>| <a href="viewsup.php">View all the Suppliers</a> | <a href="logout.php">Logout</a></i></b></div>
</head>
<body leftmargin="50" bgcolor="ivory" >
<h1> <u>
	<i> <b> <center><font color="rosybrown"> SUPPLIER FORM </font></center> </b></i>
</u></h1>
<hr color="rosybrown" align="center" size="5" width="800">

	
	</p>
	<form method="post" action="">
<fieldset>
<legend> <marquee><h3><i>Supplier's Details</i></h3> </marquee></legend>
<!--ENTER THE ACTION FOR THE FORM -->
	<h3>
	 <table border="5" cellpadding="9" cellspacing="14" align="center" hspace="400" >
<tr align="left">
		 <td align="justify">SUPPLIER ID</td>
		 <td align="justify"><input maxlength="12" max="12" type="text" name="sid" placeholder="SUPPLIER ID">
		 </td>
	    </tr>	   
	   <tr align="left" >
	      <td align="justify" > SUPPILER NAME </td>
		  <td align="justify"><input maxlength="15" max="15" type="text" name="sname" placeholder="SUPPLIER NAME"></td> 
		</tr>
		
		<tr align="left">
		 <td align="justify">TYPE</td>
		 <td align="justify">
		 	<select name="type" >
				<option value=""> TYPE</option>
		 		<option value="home personal care">HOME AND PERSONAL CARE </option>
				<option value="dairy">DAIRY</option>
				<option value="grocery">GROCERY</option>
		 		
		 		<option value="bed bath">BED & BATH</option>
		 		<option value="home appliances">HOME APPLIANCES</option>
		 		<option value="Crockery">CROCKERY</option>

		 		
			</select>
<!-- /* OTHER CONTAIN TO ADDED FURTHER */ -->
		 </td></tr>
		<tr align="left">
		 <td align="justify" > CONTACT No.</td>
		 <td align="justify">
			<input maxlength="10" max="10" type="text"  name="pno" placeholder="CONTACT No.">
		 </td>
		</tr>
<tr align="left">
		 <td align="justify" > MAIL ID</td>
		 <td align="justify">
			<input  type="text"  name="mail" placeholder="Email ID">
		 </td>
		</tr>

	    <tr align="left">
	    	<td align="justify">ADDRESS </td>
	    	<td align="justify"><textarea maxlength="100" spellcheck="false" placeholder="ADDRESS" name="add" rows="4" cols="40"  >
				</textarea> 	</td>
	    </tr>
<tr align="left">
		 <td align="justify" > PIN NUMBER</td>
		 <td align="justify">
			<input  type="text"  maxlength="6" name="pin" placeholder="Must not exceed 6 digits">
		 </td>
		</tr>
			<tr align="justify">
				<td colspan="2" align="justify"><center> <input type="submit" class="SUPPLIER"  value="Submit"  name="submit"  ></center>

	  </td>
			</tr>	

</table>
	</h3>
</fieldset>
	</form>


<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['sid']) && !empty($_POST['sname']) && !empty($_POST['type']) && !empty($_POST['pno']) && !empty($_POST['mail']) && !empty($_POST['add']) && !empty($_POST['pin'])) {  
    
$id=$_POST['sid'];  
    
$name=$_POST['sname'];  
 
$type=$_POST['type']; 
    
$pno=$_POST['pno'];
$mail=$_POST['mail'];
$add=$_POST['add'];
$pin=$_POST['pin'];
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM supplier WHERE Supplier_Id='".$id."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO supplier(Supplier_Id,Supplier_Name,Type,Contact_No,Address,pin,Mail) VALUES('$id','$name','$type','$pno','$add','$pin','$mail')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Congratulation, You have added one more Supplier Successfully!");
</script>

<?php
echo "Supplier Successfully Added";  
} else {  

?>
<script type="text/javascript">
alert("Failed to add Supplier! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("That Supplier ID already exists! Please try again with another.");
</script>

<?php    
echo "That Supplier ID already exists! Please try again with another.";  
    
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