<?php
include_once('connection.php');
$query = "select * from transaction";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>

<html>
<head>
    <title>Transaction</title>
<style>
    p {
        font-family: arial, sans-serif;
        position: absolute;
        bottom:570px;
        left: 1050px;
        background-color: skyblue;
        color: blue;
        border-radius: 5px;
        text-decoration: none;
        font-weight: normal;
        display: inline-block;
        padding: 10px 60px;
        position: absolute;
           

        


    }
    table {
        
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 85%;
  margin: 75px 0;
  margin-left: auto;
  margin-right: auto;
  background-color:black;
  color: white;
    }

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 12px;
}


body {
  margin: 0;
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



</style>

</head>
<body style = "background-color:black;">
<div class="topnav">
  <a class="active" href="home.html">Home</a>
  <a href="customer.php">Customers</a>
  <a href="transaction.php">Transactions</a>
  <a href="balance.php">Balance Enquiry</a>
</div>

    <table class="content.table">
        
        <tr>
            <th> Sender </th>
            <th> Receiver </th>
            <th> Amount </th>
            <th> Status </th>
            
        </tr>
    <?php
        
        
        while($rows=mysqli_fetch_assoc($result))
        {

    ?>
            <tr>
                <td><?php echo $rows['sender']; ?></td>
                <td><?php echo $rows['recevier']; ?></td>
                <td><?php echo $rows['amount']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                

            </tr>
    <?php
        }

    ?>
    </table>
</body>
</html>