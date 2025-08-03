<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $amount = $_POST["amount"];
    $res = mysqli_query($conn, "SELECT balance FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($res);
    if ($row['balance'] >= $amount) {
        mysqli_query($conn, "UPDATE users SET balance = balance - $amount WHERE email = '$email'");
        mysqli_query($conn, "INSERT INTO transactions (user_email, type, amount) VALUES ('$email', 'withdraw', $amount)");
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Withdraw</title></head>
<body>
    <h2>Withdraw Money</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Amount: <input type="number" name="amount" required><br><br>
        <button type="submit">Withdraw</button>
    </form>
</body>
</html>
