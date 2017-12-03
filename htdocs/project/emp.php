 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

?>  

<!doctype html>
<html>
<head>
<title>Employee Form</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 900px;"><b><i><a href="adminhome.php" align="right"> Home </a>|<a href="viewemp.php"> View all the Employees</a> | <a href="logout.php">Logout</a></i></b></div>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>EMPLOYEE FORM</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>


<script type="text/javascript">

function validatePhone()
{
var phone=document.F.pno;
if(!isNaN(phone) || phone.value==0)
{
window.alert("Please Enter a Valid PHONE NUMBER!");
phone.focus();
return false;
}
else
return true;
}

function validateAdhaar()
{
var adhaar=document.F.adhaar;
if(!isNaN(adhaar) || adhaar.value==0)
{
window.alert("Please Enter a Valid ADHAAR NUMBER!");
adhaar.focus();
return false;
}
else
return true;
}

function validatePin()
{
var pin=document.F.pin;
if(!isNaN(pin) || pin.value==0)
{
window.alert("Please Enter a Valid PIN NUMBER!");
pin.focus();
return false;
}
else
return true;
}

function ValidateMail()
{
var mail=document.F.mail;
if(mail.value.indexOf("@",0)<0)
{
alert("Please Enter a Valid E-Mail Address!");
mail.focus();
return false;
}
if(mail.value.indexOf(".",0)<0)
{
alert("Please Enter a Valid E-Mail Address!");
mail.focus();
return false;
}
}
</script>
</head>
<body STYLE="background:URL(images/abc.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:90% 90%;">


<FORM METHOD="POST" action="" name="F">
<fieldset>
<legend> <marquee><h3><i>Personal Information of Employee</i></h3> </marquee></legend>
<table border="5" cellpadding="10" cellspacing="10">



<TR>
<TH align="left">SET EMPLOYER ID</TH> <TD> <INPUT TYPE="TEXT" NAME="id" placeholder="ID"/></TD>
</TR>

<tr>
<TH align="left">EMPLOYEE NAME</TH><TD> <INPUT TYPE="TEXT" NAME="name"  placeholder="Name"/></TD>
</tr>

<TR>
<TH align="left">GENDER</TH> <TD><input type="radio" name="gender" value="Male"/> MALE   <input type="radio" name="gender" value="Female"/> FEMALE </TD>
</TR>

<TR>
<TH align="left">DATE OF BIRTH</TH> <TD> <INPUT TYPE="DATE" NAME="date" /><BR>
</TR>

<TR>
<TH align="left">BLOOD GROUP</TH> <TD><SELECT NAME="bgroup">
<OPTION>O+</OPTION>
<OPTION>O-</OPTION>
<OPTION>A+</OPTION>
<OPTION>A-</OPTION>
<OPTION>B+</OPTION>
<OPTION>B-</OPTION>
<OPTION>AB+</OPTION>
<OPTION>AB-</OPTION> </TD>
</TR>

<TR>
<TH align="left">POST</TH> <TD><SELECT NAME="post">
<OPTION>CLERK</OPTION>
<OPTION>SECURITY</OPTION>
<OPTION>HELPER</OPTION>
</TD>
</TR>

<TR>
<TH align="left">ADHAAR NUMBER</TH> <TD><input type="text" name="adhaar" onBlur="validateAdhaar()" maxlength="12" placeholder="Must not exceed 12 digits" />
</TD>
</TR>

<TR>
<TH align="left">PHONE NUMBER</TH> <TD><INPUT TYPE="TEXT" NAME="pno" onBlur="validatePhone()" MAXLENGTH="10" placeholder="Should only be of 10 digits"/></TD>
</TR>



<TR>
<TH align="left">EMAIL ID</TH> <TD> <INPUT TYPE="TEXT" name="mail" onBlur="ValidateMail()" placeholder="Mail ID"/>
</TR>



<TR>
<TH align="left">ADDRESS</TH> <TD> <TEXTAREA ROW="20" COL="20" name="add"> </TEXTAREA>
</TR>

<TR>
<TH align="left">PIN NUMBER</TH> <TD><INPUT TYPE="TEXT" NAME="pin" MAXLENGTH="6" onBlur="validatePin()" placeholder="Should not exceed 6 digits"/></TD>
</TR>

</table>
<pre>
                   <input type="submit" value="Submit" name="submit" /> <input type="reset" />
                     
</pre>
</fieldset>
</FORM>

<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['date']) && !empty($_POST['bgroup']) && !empty($_POST['post']) && !empty($_POST['adhaar']) && !empty($_POST['pno']) && !empty($_POST['mail']) && !empty($_POST['add']) && !empty($_POST['pin'])) {  
    
$id=$_POST['id'];  
    
$name=$_POST['name'];  
  
    
$date=$_POST['date'];
$gender=$_POST['gender'];
$post=$_POST['post'];
$adhaar=$_POST['adhaar'];
$bgroup=$_POST['bgroup'];
$pno=$_POST['pno'];
$mail=$_POST['mail'];
$add=$_POST['add'];
$pin=$_POST['pin'];
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$query=mysqli_query($con,"SELECT * FROM employee WHERE Emp_Id='".$id."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows==0)  
    { 
    
$sql="INSERT INTO employee(Emp_Id,Emp_Name,Gender,DOB,B_Group,Post,Adhaar_no,Phone_no,Email_Id,Address,Pin) VALUES('$id','$name','$gender','$date','$bgroup','$post','$adhaar','$pno','$mail','$add','$pin')";  
  
    
$result=mysqli_query($con,$sql);  
        
if($result){  
    

?>
<script type="text/javascript">
alert("Employee Successfully Added!");
</script>

<?php
echo "Employee Successfully Added"; 
header("Location: password.php"); 
 
} else {  

?>
<script type="text/javascript">
alert("Failed to add Emplyee! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("That Employee ID already exists! Please try again with another.");
</script>

<?php    
echo "That Employee ID already exists! Please try again with another.";  
    
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
<footer>
	<hr align="center" color="#C12A2D" size="3" width="500">

<table align="center"  cellpadding="4" cellspacing="4" border="5" ><tr align="center" > <td align="justify"><a href="D:/adi/ADMIN%20PAGE.html" >BACK </a></td></tr>		
</table>
</html>
<?php  

}  

?>  