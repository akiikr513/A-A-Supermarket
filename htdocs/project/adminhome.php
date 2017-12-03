 
<?php   

session_start();  

if(!isset($_SESSION["sess_user"])){  
    
header("location:adminlogin.php");  

} else {  

?>  


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ADMIN PAGE</title>
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
<div id="view" style="position:absolute; top: 30px; left: 1200px;"><b><i> <a href="logout.php">Logout</a></i></b></div>
<style type="text/css">

li:hover{color:red;size:20%;} 
img:hover{height:20%;width:30%;border:3px solid purple;}
a:hover{color:red;font-size:120%;font-style:italic;font-weight:bold;}
a:focus{color:red;font-size:120%;font-style:italic;font-weight:bold;}
</style>
</head>
<body style="BACKGROUND-COLOR:ivory;">

<br><BR>
<div class="div1"><marquee><h2><u><i>Welcome Admin
!  </i></u></h2></marquee> 

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
		     <b>Add & Delete		   Stock Replenishment			 Add & Delete</b>
		       <b>Supplier								   Employee</b>
</pre>
</h2>
	<center><a href="addordelsup.php"><img class="select" height=200 width=350 src="images/Su.jpg" alt="Add or Delete Supplier" /></a>
<a href="REPLENESTIMENT.php"><img class="select" height=200 width=350 src="images/rep.jpg" alt="Place Stock Replenishment Request" /></a>

	<a href="addordelemp.php"><img class="select" height=200 width=350 src="images/ep.jpg" alt="Add or Delete Employee" /></a></center><br>

<h2>
<pre>
		     <b>View Feedbacks		      Billing Record			 View Members</b>
</pre>
</h2>
<center><a href="viewfeed.php"><img class="select" height=200 width=350 src="images/fdbk.png" alt="View Feedback" /></a>
<a href="billingrecord.php"><img class="select" height=200 width=350 src="images/bill.jpg" alt="View Inventory" /></a>
<a href="viewmembers.php"><img class="select" height=200 width=350 src="images/mem.png" alt="View Members" /></a></center><br/>

<!--	<li><a href="#">Place Stock Replenishment Request</a></li>
	<li><a href="emp.php">Add or Delete Employee</a></li>
	<li><a href="#">View Feedback</a></li>
	<li><a href="#">View Inventory</a></li>
	<li><a href="#">View Members</a></li>
	<li><a href="#">Logout</a></li>
	</ul>
-->
</fieldset>
</body>
</html>
<?php  

}  

?>  