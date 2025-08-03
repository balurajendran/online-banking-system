<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM transactions ORDER BY date_time DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Transaction History</title></head>
<body>
    <h2>Transaction History</h2>
    <table border="1">
        <tr><th>Email</th><th>Type</th><th>Amount</th><th>Date</th></tr>
        <?php while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['user_email']}</td><td>{$row['type']}</td><td>{$row['amount']}</td><td>{$row['date_time']}</td></tr>";
        } ?>
    </table>
</body>
</html>
