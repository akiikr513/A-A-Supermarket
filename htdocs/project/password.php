<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$sql="SELECT Emp_Id FROM employee"; 

$result=mysqli_query($con,$sql); 
?>  
<!DOCTYPE html>
<html>
<head>
<title>PROVIDE PASSWORD TO THE EMPLOYEE FOR THE ACCOUNT ACCESS</title>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="adminhome.php" align="right"> Home </a>|<a href="viewemp.php"> View all the Employees</a> | <a href="logout.php">Logout</a></i></b></div>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>EMPLOYEE PASSWORD</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>

<script type="text/javascript">
function check()
{
var id=document.getElementId("id");
var pwd=document.getElementId("pwd");
var cpwd=document.getElementId("cpwd");
if(id.value=="")
{
alert("You have not entered your ID");
id.focus();
return false;
}
if(pwd.value=="")
{
alert("You have not entered your Password!");
pwd.focus();
return false;
}

if(cpwd.value=="")
{
alert("You have not entered the cofirm Password!");
cpwd.focus();
return false;
}

if(cpwd.value!=pwd.value)
{
alert("The Password and Confirm Password are not same... Please Enter the details again.");
cpwd.focus();
return false;
}
}
</script>
</head>
<body STYLE="background:URL(abc.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:90% 100%">


<FORM METHOD="post" action="">
<fieldset>
<legend> <marquee><h3><i>Provide password to the added Employee</i></h3> </marquee></legend>
<table border="5" cellpadding="10" cellspacing="10">



<TR>
<TH align="left">ENTER EMPLOYER ID</TH>
<TD><select name="user" id="id">
<?php  

 
        

while($row=$result->fetch_assoc()) {
?>
<option value="<?php
echo($row['Emp_Id'])
?>">
<?php
echo($row['Emp_Id'])
?>
</option>
<?php
}
?> 
</select></TD>
</TR>
<TR>
<TH align="left">SET A PASSWORD</TH> <TD> <INPUT TYPE="password" NAME="pass" id="pwd" placeholder="Set a New Password"/></TD>
</TR>
<TR>
<TH align="left">CONFIRM PASSWORD</TH> <TD> <INPUT TYPE="password" NAME="cpass" id="cpwd" placeholder="Set a New Password" onblur="check()"/></TD>
</TR>
</TABLE>
<pre>
                   <input type="reset" />	<input type="submit" value="Save user's Login Details" name="submit" />
                     
</pre>
</filedset>
</FORM>


<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['cpass'])) {  
    
$id=$_POST['user'];  
    
$pass=$_POST['pass'];  
 
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM login WHERE ID='".$id."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO login(ID,Password) VALUES('$id','$pass')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Congratulation, You have added Login details of the employee Successfully!");
</script>

<?php
echo "Login Password Successfully Issued";  
} else {  

?>
<script type="text/javascript">
alert("Failed to issue Password! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("The Password has been already issued to this Emlpoyee! Please try again with another.");
</script>

<?php    
echo "The Password has been already issued to this Emlpoyee! Please try again with another.";  
    
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
</BODY>
</html>
<?php
}
?>