<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>EMPLOYEE LOG IN</title>
<script type="text/javascript">
function check()
{
var id=document.getElementId("id");
var pwd=document.getElementId("pwd");
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

}
</script>
</head>
<header > <h1> <center><font color='purple'><strong><u>.....EMPLOYEE LOG IN......</u></strong></font></center></h1>

</header>

<body bgcolor="ivory" topmargin="80" leftmargin="100" rightmargin="100" bottommargin="50" STYLE="background:URL(images/ab.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:100% 150%;">
	
	
		<form class="LOG IN" method="post" action="" >
		<!-- ENTER THE ACTION FOR FORM-->
			<table align="center"  cellpadding="3" cellspacing="3" border="3">
				<tr align="justify" class="LOG IN">
					<td align="justify" class="LOG IN" colspan="2"><center><h2><u>EMPLOYEE LOG IN</u><center></h2></td>
				</tr>
				<tr align="justify" class="LOG IN">
					<td align="justify" class="LOG IN">EMPLOYEE ID</td>
					<td align="justify" class="LOG IN"><input type="text" placeholder="Employee ID" align="middle" id="id" name="user"></td>
				</tr>
			  <tr align="justify" class="LOG IN">
			  	<td align="justify" class="LOG IN"> PASSWORD</td>

					<td align="justify" class="LOG IN"><input type="password" placeholder="Password" id="pwd" name="pass"></td>
				</tr>
				 <tr align="justify" class="LOG IN">
			  	<td colspan="2" align="justify" class="LOG IN"><center> <input type="submit" onsubmit="check()" name="submit" value="LOG IN" align="middle"> </center> </td>
				</tr>
				
			</table>
		</form>
<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    
$user=$_POST['user'];  
    
$pass=$_POST['pass'];  
  
    
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("cannot select DB");  
 


 
    
$query=mysqli_query($con,"SELECT * FROM login WHERE ID='".$user."' AND Password='".$pass."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows!=0)  
    
{  
    
while($row=mysqli_fetch_assoc($query))  
    
{  
    
$dbusername=$row['ID'];  
    
$dbpassword=$row['Password'];  
    
}  
  
    
if($user == 'admin')  
    
{ 
?>
<script type="text/javascript">
alert("Are you Admin? Please Log in throuh Admin Log in Form.");
</script>
<?php
header("Location: employeelogin.php");
}
else if($user == $dbusername && $pass == $dbpassword)  
    
{  
    
session_start();  
    
$_SESSION['sess_user']=$user;  
  
   
 /* Redirect browser */  
    
header("Location: employeehome.php");  
    
}  
    
} else {  
    
echo "Invalid username or password!";  
    
}  
  

} else {  
    
echo "All fields are required!";  

}  

}  

?> 
</body>
<footer>


	
	
	<h4><center><a href="login.html"><b><u>BACK</u></b></a></center> </h4>

	

</footer> 
</html>
