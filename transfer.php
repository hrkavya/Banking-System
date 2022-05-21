<html>
<head>
    <title>Transfer Money</title>
    <style>
        
        body {
           
            font-family: Arial, Helvetica, sans-serif;
            font-family:"Convergence",sans-serif;
            padding: 2px;
            background-color: black;
            color: white;
            
           
            align-items: center;
            font-size: 1.2rem;
            background-color:powder blue;
        }
        
        input[type=text] {
        box-sizing: border-box;
        width: 30%;
        padding: 10px 5px;
        margin-top: 35px;
        margin-left: 45px;
        margin-right: 55px;
        border-radius: 5px;
        position: center;
}
input[type=submit] {
    box-sizing: border-box;
        width: 10%;
        padding: 10px 5px;
        margin-top: 100px;
        margin-left: 250px;
        font-family:"aeris";

        border-radius: 5px;
        position: center;
}
input[type=submit]:hover {
            background-color: #ddd;
            color: green;
        }
        h2 {
            background-color: green;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: normal;
            display: inline-block;
            padding: 20px 20px;
            position: absolute;
            bottom:50px;
            left: 420px;

        }
        h3 {
            background-color: orange;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: normal;
            display: inline-block;
            padding: 10px 10px;
            position: absolute;
            bottom:50px;
            left: 420px;

        }
       
.topnav {
  overflow: hidden;
  background-color: #333;
  margin:0;
  
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


        </style>
</head>
<body>
<div class="topnav">
  <a class="active" href="home.html">Home</a>
  <a href="customer.php">Customers</a>
  <a href="transaction.php">Transactions</a>
  <a href="#about">About</a>
</div>
<form action="transfer.php" method="post">
    <center>
    <label for="sno">Senders's account number:</label>
    <input type="text" id="" name="acc1" 
    value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"><br>
    <label for="rno">Receivers's account number:</label>
    <input type="text" id="" name="acc2"><br>
    <label for="amount">Amount:</label>
    <input type="text" id="" name="amm"><br>
    <input type="submit" value="Transfer">
</center>
</form>
<?php 
include_once('connection.php');
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){

    
    $sender = $_POST['acc1'];
    $recevier = $_POST['acc2'];
    $amount = $_POST['amm'];
   
    
    $checkblcquery = "SELECT balance FROM customer where acc_no='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['balance'];
    
    if($ava_blc >= $amount){
    $sql1 = "UPDATE customer SET balance= balance-$amount WHERE acc_no='$sender'";
    $sql2 = "UPDATE customer SET balance= balance+$amount WHERE acc_no='$recevier'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    
    if($result1 && $result2){
        echo '<div class="alert alert-success align-items-center text-center" style="width:50%;" role="alert">
        <div>   
        <h2><i class="fas fa-check-circle"></i>
          Amount Transfered Successfully!</h2></div>
        </div>
      </div>';

      $sqltran = "INSERT INTO `transaction` (`sender`, `recevier`, `amount`, `status`) VALUES ('$sender', '$recevier', '$amount', 'succeed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" style="width:50%;" role="alert">
        <div>
        <h4><i class="fas fa-times-circle"></i>
        Oops! Something went wrong!</h4>
        </div>
      </div>';
      $sqltran = "INSERT INTO `transaction` (`sender`, `recevier`, `amount`, `status`) VALUES ('$sender', '$recevier', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }
}else{
    echo '<div class="alert alert-danger align-items-center text-center" style="width:50%;" role="alert">
        <div>   
        <h3><i class="fas fa-times-circle"></i>
        Not Sufficient Balance in Account!</h3></div>
        </div>
      </div>';
      $sqltran = "INSERT INTO `transaction` (`sender`, `recevier`, `amount`, `status`) VALUES ('$sender', '$recevier', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
}
}
}
?>
</body>
</html>
















