<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

?>  

<!doctype html>
<html>
<head>
<title> ADD OR DELETE</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 1000px;"><b><i><a href="adminhome.php" align="right"> Home </a>| <a href="logout.php">Logout</a></i></b></div>

<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>ADD OR DELETE EMPLOYEE</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>
</head>
<body>
<table border="9" cellspacing="14" cellpadding="9" align="center" size="4">
<tr><td>
<a href="emp.php">
<img src="images/empadd.png" width="300px" height="300px"></a>
</td>
<td>
<a href="delemp.php">

<img src="images/empdel.png" width="300px" height="300px"></a>
</td>
</tr>
<tr><td align="justify"><center>ADD EMPLOYEES</center></td>
<td align="justify"><center>DELETE EMPLOYEES</center></td>
</tr>
</table>
</body>
</html>
<?php  

}  

?>  