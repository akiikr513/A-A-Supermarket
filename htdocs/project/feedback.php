<!DOCTYPE html>

<html>
<head>
<title>Feedback</title>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><center><font color='rosybrown'><b><u>**FEEDBACK**</u><b></font>	</center></h1>
<hr color="rosybrown" width=400 height=400 />
<center><img src="images\j.jpg"/><center/>

</head>
<body topmargin="10" style="BACKGROUND-COLOR:ivory;">
<form method="post" action="">

<fieldset>
<legend> <marquee><h3><i>Please Drop Your Feedback...</i></h3> </marquee></legend>

<table border=8 cellpadding=15 cellspacing="8" align="center">

<tr><th>Email ID </th><td><input type="text" name="mail" /></td></tr>
<tr><th>Rating </th><td><center><SELECT NAME="rate">
<OPTION>1</OPTION>
<OPTION>2</OPTION>
<OPTION>3</OPTION>
<OPTION>4</OPTION>
<OPTION>5</OPTION>
<center/></td></tr>
<tr><th>Feedback </th><td><TEXTAREA ROW="100" COL="50" name="feed"></textarea>
</td></tr>

<tr><td colspan=2 align="center"><input type="submit" value="Submit" name="submit" /></td></tr>

</table>
<p align="right">Contact Number : 9876543210 <br>
Email :<em> market@gmail.com </em></p>
</fieldset>
</form>

<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['rate']) && !empty($_POST['feed']) && !empty($_POST['mail'])) {  
    
  
    
$rate=$_POST['rate'];  
 
    
$feed=$_POST['feed'];
$mail=$_POST['mail'];

$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM feedback WHERE Mail_id='".$mail."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO feedback(Mail_id,Rate,Description) VALUES('$mail','$rate','$feed')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Your feedback has been accepted Successfully! Thank you for your time.");
</script>

<?php
echo "Feedback accepted.";  
} else {  

?>
<script type="text/javascript">
alert("Failed to take your Feedback...");
</script>

<?php    
echo "Please try again!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("Sorry for the trouble!");
</script>

<?php    
echo "Sorry for the trouble!";  
    
}  
  

} else { 
?>
<script type="text/javascript">
alert("Kindly fill the complete details!");
</script>

<?php  
    
echo "All fields are required!";  

}  

}  

?> 
 
    

    

</body>
<footer>
<p>
	<p>
		
	
  <tr align="justify">
	  
	  <td align="justify" ><a href="home.html" name="HOME" shape="square"><u>HOME</u></a></td>

	
  </tr>
</table>

	</p>
</p>
</footer>
</html>