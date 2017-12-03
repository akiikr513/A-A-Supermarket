 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:employeelogin.php");  

} else {  

?>  

<!doctype html>
<html>
<head>
<title>MEMBER</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="employeehome.php" align="right"> Home </a>| <a href="logout.php">Logout</a></i></b></div>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>MEMBERSHIP FORM</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>
</head>
<body STYLE="background:URL(abc.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:90% 100%">


<FORM METHOD="post" action="">

<fieldset>
<legend> <marquee><h3><i>Personal Information of the Customer...</i></h3> </marquee></legend>
<table border="5" cellpadding="10" cellspacing="10" >

<tr>
<TH align="left">CONTACT NUMBER</TH><TD> <INPUT TYPE="TEXT" maxlength="10" NAME="pno"/></TD>
</tr>

<TR>
<TH align="left">CUSTOMER NAME</TH> <TD> <INPUT TYPE="TEXT" NAME="name" /></TD>
</TR>



<TR>
<TH align="left">E-MAIL ID</TH> <TD> <INPUT TYPE="TEXT" NAME="mail"/><BR>
</TR>




</table>
<PRE>
                   <input type="reset" />	<input type="submit" value="Submit" name="submit"/>
                     
</PRE>
</fieldset>
</FORM>

<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['name']) && !empty($_POST['pno']) && !empty($_POST['mail'])) {  
    
  
    
$name=$_POST['name'];  
 
    
$pno=$_POST['pno'];
$mail=$_POST['mail'];

$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM member WHERE Phno='".$pno."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO member(Phno,Cus_Name,Email_Id) VALUES('$pno','$name','$mail')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("The customer membership is accepted Successfully!");
</script>

<?php
echo "Member Successfully Added";  
} else {  

?>
<script type="text/javascript">
alert("Failed to add Member! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("This customer is already a member!");
</script>

<?php    
echo "The customer is already a member!";  
    
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