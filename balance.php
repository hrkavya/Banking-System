<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
    margin: 5;
    color: white;
    font-size:30px;
    font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
 
  
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
input[type=number] {
        box-sizing: border-box;
        width: 30%;
        padding: 10px 5px;
        margin-top: 45px;
        margin-left: 45px;
        margin-right: 55px;
        border-radius: 5px;
        position: center;
}
input[type=submit] {
    box-sizing: border-box;
        width: 10%;
        padding: 10px 5px;
        margin-top: 50px;
        margin-left: 150px;
        font-family:"aeris";

        border-radius: 5px;
        position: center;
}


    </style>

</head>




<body style = "background-color:black;">
<div class="topnav">
  <a class="active" href="home.html">Home</a>
  <a href="customer.php">Customers</a>
  <a href="transaction.php">Transactions</a>
  <a href="#about">Balance Enquiry</a>
</div>
    <form action="balance.php" method="post">
    <center>
    <label for="sno">Account number:</label>
    <input type="number" id="" name="acc1"><br>
    <input type="submit" value="Check balance">
    </center>
</body>
<?php 
  error_reporting(0);
  include_once('connection.php');
  if(!$conn){
    die("Connection not established: ".mysqli_connect_error());
  }else{



  
      $sender = $_POST['acc1'];
      $query = "SELECT balance FROM customer where acc_no='$sender'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      $value= $row['balance'];
      $message="Your balance is $value";
      echo "$message";
  
    
}

?>

</html>


