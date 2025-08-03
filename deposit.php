<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $amount = $_POST["amount"];
    mysqli_query($conn, "UPDATE users SET balance = balance + $amount WHERE email = '$email'");
    mysqli_query($conn, "INSERT INTO transactions (user_email, type, amount) VALUES ('$email', 'deposit', $amount)");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Deposit</title></head>
<body>
    <h2>Deposit Money</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Amount: <input type="number" name="amount" required><br><br>
        <button type="submit">Deposit</button>
    </form>
</body>
</html>
