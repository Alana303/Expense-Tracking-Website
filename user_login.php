<?php
session_start(); // Start session
include('config.php');
include('functions.php');

header('Content-Type: application/json'); // Ensure correct response type

$response = [];

if(isset($_POST['login'])){
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);
    
    $res = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $verify = password_verify($password, $row['password']);
        
        if($verify){
            $_SESSION['UID'] = $row['id'];
            $_SESSION['UNAME'] = $row['username'];
            $_SESSION['UROLE'] = $row['role'];

            // Set correct redirect URL
            $redirectUrl = ($_SESSION['UROLE'] == 'User') ? "dashboard.php" : "category.php";

            $response = [
                "status" => "success",
                "message" => "✅ Login successful! Redirecting...",
                "redirect" => $redirectUrl
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "❌ Invalid password. Try again."
            ];
        }
    } else {
        $response = [
            "status" => "error",
            "message" => "❌ Username not found. Please sign up."
        ];
    }
} else {
    $response = [
        "status" => "error",
        "message" => "Invalid request."
    ];
}

echo json_encode($response);
exit();
?>
