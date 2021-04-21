

<?php 
    require_once('connection.php');
    session_start();
    $sql = "SELECT * FROM `transactions`";
    $result = $conn->query($sql);
//     if(isset($_SESSION['transaction_successfull'])){
//       $success_msg = $_SESSION['success_msg'];
// }
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
  border: 1px solid #dddddd;
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

<?php if($result->num_rows > 0){ ?>
       <!--  <?php echo $success_msg; ?> -->
        <div style="height: 90px; width: 100%; background-color: #000066; margin-bottom: 30px; ">
            <p style="color: white; font-family: sans-serif; font-size: 2.2rem; margin-left: 40vw; padding-top: 28px; font-weight:600;"> Transactions History </p>
            <div class="text-box">
              <a href="index.php" class="btn btn-white btn-animate">HOME</a>
            </div>
            <div style="margin-right: 370px;" class="text-box">
              <a href="customers.php" class="btn btn-white btn-animate">CUSTOMERS</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Transaction ID</th>
                    <th>Sender's Account Number</th>
                    <th>Recipient's Account Number</th>
                    <th>Amount</th>
                    <th>Timestamp</th>  
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial_no = 1;
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $serial_no; ?></td>
                    <td><?php echo $row['transaction_id']; ?></td>
                    <td><?php echo $row['sender_acc_num']; ?></td>
                    <td><?php echo $row['recipient_acc_num']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                </tr>
                <?php $serial_no++; 
                 }
                 } ?>

</body>
</html>

<?php session_destroy(); ?>