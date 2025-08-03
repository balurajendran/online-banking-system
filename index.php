<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mini Banking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Account List</h1>
    <a href="create_account.php">Create Account</a> |
    <a href="deposit.php">Deposit</a> |
    <a href="withdraw.php">Withdraw</a> |
    <a href="transaction_history.php">Transaction History</a>
    <table border="1">
        <tr><th>Name</th><th>Email</th><th>Balance</th></tr>
        <?php while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['balance']}</td></tr>";
        } ?>
    </table>
</body>
</html>
