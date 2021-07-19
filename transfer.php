<!DOCTYPE html>
<html lang="en">
<head>
  <title>Banking_System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
 $id=$_REQUEST['Id'];
  
  $sql=mysqli_query($con,"select Name from transfer where Id='$id'");
  $arr=mysqli_fetch_array($sql);
  $Sender=$arr[0];
if(isset($_POST['submit'])){
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
		echo"Transfer Successful";
		
	}
	else{
		echo"Transfer Failed.";
	}	
}
?>

<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="back">
<img src="transfer.svg" alt="bank" width="100%"height="100%">
</div>
</div>
<div class="col-md-6">
<div class="but">
<h2> Money Transfer </h2>
</div>
<body style="background-color:">
<div clas="me">
<form action="history.php" method="post" onsubmit="showAlert()">
<table align="center">
<tr><td><input type="text" value="<?php echo $Sender?>" name="Sender" readonly></td></tr>
<tr><td><select name="Receiver" required>
         <option value="#">Select Receiver Name</option>
		 <?php
		  $sql=mysqli_query($con,"select Name from transfer");
		  while($option=mysqli_fetch_array($sql)){
			  echo "<option value='{$option['Name']}'>{$option['Name']}</option>";
		  }
		?>
</select></td></tr>
<tr><td><input type="number" placeholder="Enter Amount" name="Amount"></td></tr>
<tr><td><input type="submit" value="Transfer" name="Transfer" class="btn"></td></tr>

</table>
</div>
</form>
</div>
</div>

</body>
</html>
<style type="text/css">
 	.navbar{
         background-color:#114E60;} 
		 
form{background-color:white;
          background-image: url('.jpg');
          background-repeat:no-repeat;
         text-align:justify;
          width:30%;	    
           height:60%;	  
          
          
 }	
	
  form input,select{margin-top:10%;
                    width:270px;
                    text-align:justify;
                    border-radius:10px;
                     padding:5px;
                     margin-left:20px;
					 background-color:#98DED9;
					 color:black;
                  }

.but h2{ margin-left:0px;
          
          color:#150E56;} 
		  
	.btn{ width:80px;
                    text-align:justify;
                    border-radius:10px;
                     padding:5px;
                     margin-left:100px;
					 background-color:green;
					 color:white;
	} 
	