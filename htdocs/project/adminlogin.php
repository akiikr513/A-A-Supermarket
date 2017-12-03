<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADMIN LOG IN</title>
</head>
<header > <h1> <center><font color='purple'><strong><u>......ADMIN LOG IN......</u></strong></font></center></h1>

</header>

<body bgcolor="ivory" topmargin="80" leftmargin="100" rightmargin="100" bottommargin="50" STYLE="background:URL(images/ab.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:100% 150%;">
<br>
<br>
		<form class="LOG IN" method="post" action="" >
		<!-- ENTER THE ACTION FOR FORM-->
			<table align="center"  cellpadding="3" cellspacing="3" border="3">
				<tr align="justify" class="LOG IN">
					<td align="justify" class="LOG IN" colspan="2"><center><h2><u>ADMIN LOG IN</u></h2></center></td>
				</tr>
				<tr align="justify" class="LOG IN">
					<td align="justify" class="LOG IN">ADMIN ID</td>
					<td align="justify" class="LOG IN"><input type="text" placeholder="Enter your ID please..." align="middle" class="LOG IN" name="user"></td>
				</tr>
			  <tr align="justify" class="LOG IN">
			  	<td align="justify" class="LOG IN"> PASSWORD</td>

					<td align="justify" class="LOG IN"><input type="password" placeholder="Password" class="LOG IN" name="pass"></td>
				</tr>
				 <tr align="justify" class="LOG IN">
			  	<td colspan="2" align="justify" class="LOG IN"><center> <input type="submit" placeholder="Submit" name="submit" value="LOG IN" align="middle"> </center> </td>
				</tr>
				
			</table>
	</form>


<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    
$user=$_POST['user'];  
    
$pass=$_POST['pass'];  
  
    
$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB");  
  
    
$query=mysqli_query($con,"SELECT * FROM login WHERE ID='".$user."' AND Password='".$pass."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows!=0)  
    
{  
    
while($row=mysqli_fetch_assoc($query))  
    
{  
    
$dbusername=$row['ID'];  
    
$dbpassword=$row['Password'];  
    
}  
  
    
if($user == $dbusername && $pass == $dbpassword)  
    
{  
    
session_start();  
    
$_SESSION['sess_user']=$user;  
  
   
 /* Redirect browser */  
    
header("Location: adminhome.php");  
    
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



	
	
	<center><a href="login.html"><b><u>BACK</u></b></a></center>

	</tr>
</table>
</footer> 
</html>
