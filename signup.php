<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $balance = $_POST["balance"];

    $query = "INSERT INTO users (name, email, password, balance) VALUES ('$name', '$email', '$password', '$balance')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<h2>Sign Up</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Initial Balance: <input type="number" name="balance" required><br><br>
    <button type="submit">Sign Up</button>
</form>
