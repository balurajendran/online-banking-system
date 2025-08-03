<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $balance = $_POST["balance"];
    mysqli_query($conn, "INSERT INTO users (name, email, balance) VALUES ('$name', '$email', '$balance')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Create Account</title></head>
<body>
    <h2>Create New Account</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Balance: <input type="number" name="balance" required><br><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
