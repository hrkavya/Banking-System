<?php
include_once('connection.php');
$query = "select * from customer";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All customer</title>
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
    a{
        text-decoration:none;
        
    }
    .mybtn {

box-shadow: 2px 2px 10px black;
border-radius: 50px;
font-weight: bold;
background-color: lightgreen;
color: green;
padding: 10px 50px;
}

.mybtn:active {
background-color: green;
color: lightgreen;
}
    table {
        background-color:(0,0,0,0.5);
  font-family: arial, sans-serif;
  color: white;
  font-weight: bold;
  border-collapse: collapse;
  width: 85%;
  
  margin: 75px 0;
  margin-left: auto;
  margin-right: auto;
    }

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 15px;
}

tr:nth-child(even) {
  font-weight: bold;
  color:white;
 
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
  padding: 12px 16px;
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
<body style="background-color:black;">
<div class="topnav">
  <a class="active" href="home.html">Home</a>
  <a href="customer.php">Customers</a>
  <a href="transaction.php">Transactions</a>
  <a href="balance.php">Balance Enquiry</a>
</div>

  
    <table class="content.table"  >
       
        <tr>
            
            <th> Name </th>
            <th> Email </th>
            <th> AccountNo </th>
            <th> Balance </th>
            <th scope="col">Send Money From</th>
    <?php
        
        
        while($rows=mysqli_fetch_assoc($result))
        {

    ?>
            <tr>
                
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['acc_no']; ?></td>
                <td><?php echo $rows['balance']; ?></td>
                <td style="padding:8px 8px 8px 8px">
                <a href="transfer.php?reads=<?php echo $rows['acc_no'];?>"
              <button type="button" class="btn mybtn btn-outline-light">Send Money</button>
              </a>

            </tr>
    <?php
        }

    ?>
    </table>
</body>
</html>