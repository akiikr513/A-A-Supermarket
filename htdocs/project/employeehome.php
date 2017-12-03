
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:employeelogin.php");  

} else {  

?>  

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>EMPLOYEE HOME PAGE</title>
<div id="view" style="position:absolute; top: 30px; left: 1100px;"><b><i> <a href="logout.php">Logout</a></i></b></div>
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
<!-- <img src="images/out.jpg" alt="Log out" align="right" height=100 weight=80 /> -->  <br><br><br><br>
<style type="text/css">
li:hover{color:red;size:20%;}
img:hover{height:20%;width:30%;border:3px solid purple;}
a:hover{color:red;font-size:120%;font-style:italic;font-weight:bold;}
a:focus{color:red;font-size:120%;font-style:italic;font-weight:bold;}
</style>
</head>
<body style="BACKGROUND-COLOR:ivory;">
<div class="div1">
<marquee><h2><u><i>Welcome Employee!!! </i></u></h2></marquee> 

<p>
    </div>
    <div id="sliderFrame">
        <div id="slider">
	  
	    <img src="images/b.jpg" alt="Welcome to Super Market!" />
            <img src="images/c.jpg" alt="Everything at best prices..." />
            <img src="images/d.jpg" alt="Take Happiness Home with you..." />
            <img src="images/f.jpg" alt="Shop Shop Shop" />
            <img src="images/g.jpg" alt="At best discouts" />
       	   </div>
       <div id="htmlcaption" style="display: none;">
         
        </div>
    </div>

    <div class="div2">
       
    </div>

<fieldset>
<legend> <marquee><h3><i>Select your option...</i></h3> </marquee></legend>
<h2>
<pre>
		     <b>Membership			      Stock Entry			 Billing</b>
</pre>
</h2>	
	<center>
<a href="membership.php"><img class="select" height=200 width=350 src="images/memb.jpg" alt="Provide Membership" /></a>
<a href="STOCK2.php"><img class="select" height=200 width=350 src="images/stock.jpg" alt="Add to stock" /></a>
<a href="invoice.php"><img class="select" height=200 width=350 src="images/emp.jpg" alt="Sale Products" /></a></center><br/>



</fieldset>
</body>
</html>
<?php  

}  

?>  