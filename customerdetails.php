
<!Doctype html>
<html>
<head>
<title></title>
<meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<h4><center><b><u>CUSTOMERS DETAILS</u></b></center> </h4>
<table border="4" class="decorate" id="t01">
<tr>
<th>Id</th>
<th> Name</th>
<th>Contact_No</th>
<th>Dist</th>
<th>Ac_No</th>
<th>Total_Amount</th>
</tr>
<?php
include("connection.php");
$query="select * from transfer";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);


if ($total!=0)
{
while($result=mysqli_fetch_assoc($data))
{
$custid=$result['Id'];

echo"
<tr>
<td>{$result['Id']}</td>
<td>{$result['Name']}</td>
<td>{$result['Contact_No']}</td>
<td>{$result['Dist']}</td>
<td>{$result['Ac_No']}</td>
<td>{$result['Total_Amount']}</td>
<td><a href='transfer.php ? Id=$custid' class='btn btn-white btn-animation-1'> Money Transfer </a></td>
</tr>
   ";
}
}

else
{
echo "No result found";
}
?>

</table>
<style>
body{ background-color:#E8E8E8;}
.btn:link,
.btn:visited{
  text-decoration: none;
  text-transform:uppercase;
  position:relative;
  top:0;
  left:0;
  padding:10px 35px;
  border-radius:40px;
  display:inline-block;
  transition: all .5s;
}


.btn:hover{
   box-shadow:0px 10px 10px rgba(0,0,0,0.2);
   transform : translateY(-3px);
}

.btn-bottom-animation-1{
  animation:comeFromBottom 1s ease-out .8s;
}

.btn::after{
  content:"";
  text-decoration: none;
  text-transform:uppercase;
  position:absolute;
  width:100%;
  height:100%;
  top:0;
  left:0;
  border-radius:20px;
  display:inline-block;
  z-index:-1;
  transition: all .5s;
}

.btn-white::after {
    background: #fff;
}

.btn-animation-1:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}


table {
  width:70%;
 
  margin-left:5%;
  
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 11px;
 
}
#t01 tr:nth-child(even) {
  background-color: #FFEEDB;
}
#t01 tr:nth-child(odd) {
 background-color: #FFD8CC;
}
#t01 th {
  background-color:#161616;
  color: white;
}
</style>
</body>
</html>