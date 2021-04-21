<?php
    //connecting to db
    session_start();
    require_once('connection.php');

    //PHP script to take data out of db
    $sql = "SELECT * FROM `estuaryBank`.`customers`";
    $result = $conn->query($sql);

?>


<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 2px solid darkgrey;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


.text-box {
    margin-left: 44vw;
   margin-top: 42vh;
   text-align: right;
   margin-top: -80px;
   margin-right: 180px;
}

.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 35px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
    position: absolute;
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white {
    background-color: #fff;
    color: #777;
    font-family: sans-serif;
}

.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}

.btn-white::after {
    background-color: #fff;
}

.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}

@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}

</style>
</head>
<body style="background-color: #f2f2f2;">

  <div style="height: 90px; width: 100%; background-color: #000066; margin-bottom: 30px; ">
    <p style="color: white; font-family: sans-serif; font-size: 2.2rem; margin-left: 40vw; padding-top: 28px; font-weight:600;"> CUSTOMERS </p>
    <div class="text-box">
      <a href="index.php" class="btn btn-white btn-animate">HOME</a>
    </div>
    <div style="margin-right: 480px;" class="text-box">
      <a href="transactionHistory.php" class="btn btn-white btn-animate">PREVIOUS TRANSACTIONS</a>
    </div>
  </div>


<table>
  <tr>
    <th>S. No.</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Account number</th>
    <th>Balance</th>
    <th>Transaction</th>
  </tr>
  <?php 
        $i = 1;
        while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['contact_num']; ?></td>
            <td><?php echo $row['account_num']; ?></td>
            <td><?php echo $row['current_balance']; ?></td>
            <!-- Link to send customer_id to the transaction page -->
            <td><a href="transfer.php?c_id=<?php echo $row['customer_id']; ?>" target="_blank">Transfer money</a></td>
        </tr>
    <?php $i++; } ?>
</table>

</body>
</html>