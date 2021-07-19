<!DOCTYPE html>
<html lang="en">
<head>
  <title>Banking_System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="luck.png" alt="logo" style="width:40px;">
  </a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">Home</a>
    </li> 
  </ul>
</nav>

<?php
 
include("connection.php");


	$Sender=$_POST['Sender'];
	$Receiver=$_POST['Receiver'];
	$Amount=$_POST['Amount'];
	
	$sql1=mysqli_query($con,"select Total_Amount from transfer where Name='$Sender'");
	$arr=mysqli_fetch_array($sql1);
	$remaining_amount=$arr[0]-$Amount;
	$sql2=mysqli_query($con,"update transfer set Total_Amount='$remaining_amount' where Name='$Sender'");
	
	$sql3=mysqli_query($con,"select Total_Amount from transfer where Name='$Receiver'");
	$arr=mysqli_fetch_array($sql3);
	$Updated_amount=$arr[0]+$Amount;
	$sql4=mysqli_query($con,"update transfer set Total_Amount='$Updated_amount' where Name='$Receiver'");
	if($sql4){
		echo"<img src='sucess.jpg'><b>Transaction is Successful</b>";
		
		
	}
	else{
		echo"Transfer Failed.";
	}	

?>
<a href="customerdetails.php" button class="button" style="vertical-align:middle"><span>View Transfer History </span></button></a>
</body>
<style>

.navbar{
         background-color:#114E60;} 
		 .back{ width:100%;
		       height:200px;
			   position:absolute;} 
	
	

.but{padding-top:40px;}
	
	.button {
  display: inline-block;
  border-radius: 60px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 24px;
  padding-top: 0px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left:10%;
  margin-top:20%;

}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.button {
  display: inline-block;
  border-radius: 60px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 24px;
  padding-top: 0px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  

}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
 </style>
</html>