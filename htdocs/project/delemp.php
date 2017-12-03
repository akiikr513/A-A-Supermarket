<?php   



$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    
mysqli_select_db($con,'super_market') or die("Cannot select DB!");  
 
$sql="SELECT Emp_Id FROM employee"; 

$result=mysqli_query($con,$sql); 
?> 
<!doctype html>
<html>
<head>
<title>Delete Supplier</title><br><br>
<div id="view" style="position:absolute; top: 30px; left: 1000px;"><b><i><a href="adminhome.php" align="right"> Home </a>| <a href="logout.php">Logout</a></i></b></div>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
<h1><CENTER><font color="rosybrown"><u>DELETE EMPLOYEE</u><font></CENTER></h1>
<hr color="rosybrown" width=400 height=400 />
<style type="text/css">
INPUT:hover{color:rosybrown;}
INPUT:focus{color:red;}
</style>
<script>
function myFunction(r){
if(window.XMLHttpRequest) {
xmlhtp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if(xmlhttp.readyState == 4 && xmlhttp.status ==200) {
document.getElementById("change").value=xmlhttp.responseText;
}
}
xmlhttp.open("GET","getdetails.php?sid="+r,true);
xmlhttp.send();
}

</script>
</head>
<body STYLE="background:URL(images/abc.jpg);BACKGROUND-REPEAT:NO-REPEAT; BACKGROUND-SIZE:90% 200%">
<form method="post" action="">

<table border="5" cellpadding="10" cellspacing="10">



<TR>
<TH align="left">SELECT THE EMPLOYEE ID TO BE DELETED</th>
<td><select name="id" onblur="myFunction(this.value)">
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
</select>

</td></tr>

</table>
<pre>
                   <input type="submit" value="Delete" name="submit" /> <input type="reset" />
                     
</pre>
</form>

<?php  

if(isset($_POST["submit"])){  
  

if(!empty($_POST['id'])) {  
    
$id=$_POST['id'];  
      
 
 
$query=mysqli_query($con,"SELECT * FROM employee WHERE Emp_Id='".$id."'");  
    
$numrows=mysqli_num_rows($query);  
    
if($numrows>0)  
    { 
    
$sql="DELETE FROM employee WHERE Emp_Id='".$id."'";  
  
    
$result=mysqli_query($con,$sql); 
 
        
if($result){  
    
$sql1="DELETE FROM login WHERE ID='".$id."'";  
  
    
$result1=mysqli_query($con,$sql1); 
if($result1){ 
?>
<script type="text/javascript">
alert("You have deleted the Employee Successfully!");
</script>

<?php
echo "Employee Successfully Deleted";  
}
} else {  

?>
<script type="text/javascript">
alert("Failed to Delete the Employee! Please try again...");
</script>

<?php    
echo "Failure!";  
    
}
    
  
  
    
} else {  

?>
<script type="text/javascript">
alert("There is no such Employee.");
</script>

<?php    
echo "There is no such Employee";  
    
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


