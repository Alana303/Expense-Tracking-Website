<?php
// If the page is accessed directly via the browser, redirect to redirect.html
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: redirect.html");
    exit();
}

include('config.php');
include('functions.php');

$msg = "";

if (isset($_POST['login'])) {
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);

    $res = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $verify = password_verify($password, $row['password']);

        if ($verify) {
            $_SESSION['UID'] = $row['id'];
            $_SESSION['UNAME'] = $row['username'];
            $_SESSION['UROLE'] = $row['role'];

            // Redirect to home.html instead of dashboard.php
            redirect('home.html');
        } else {
            $msg = "❌ Invalid password. Try again.";
        }
    } else {
        $msg = "❌ Username not found. Please sign up.";
    }
}

?>
