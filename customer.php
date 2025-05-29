<?php
// Include DB connection
include('config.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $full_name = $_POST['full_name'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $stmt = $con->prepare("INSERT INTO users (full_name, username, email, password, role) VALUES (?, ?, ?, ?, 'User')");
        $stmt->bind_param("ssss", $full_name, $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $message = "<span style='color: green;'>✅ Registration successful! Redirecting to your dashboard...</span>";
            header("refresh:2;url=http://localhost:85/Projects/WebProjects/TrackWise/expense/home.html"); // 2-second delay
        } else {
            $message = "<span style='color: red;'>❌ Error: Could not register user. Try again.</span>";
        }

        $stmt->close();
    } else {
        $message = "<span style='color: red;'>❌ Passwords do not match.</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TrackWise - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="redirect.css">
</head>
<body>
    <div class="container">
        <h1><b>JOIN TRACKWISE</b></h1>
        <p><b>Create your account to begin tracking your expenses effectively.</b></p>

        <h2><b>Sign Up</b></h2>

        <form method="POST" action="customer.php">
            <label for="full_name"><b>Full Name</b></label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter your Full Name" required>

            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <label for="confirm_password"><b>Confirm Password</b></label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>

            <button type="submit" name="register"><b>Register</b></button>
        </form>

        <p id="message"><?= $message ?></p>

        <p><b>Already have an account? <a href="redirect.html"><b>Login</b></a></b></p>
    </div>
</body>
</html>
