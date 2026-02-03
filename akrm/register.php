<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير كلمة المرور

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo "✅ Account created successfully!";
    } else {
        echo "❌ Error creating account.";
    }
}
?>
<center>
<form method="POST">
    <h2>Register</h2>
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
<a href="login.php">لديك حساب بالفعل دخول</a>
</center>