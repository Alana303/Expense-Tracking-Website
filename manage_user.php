<?php
include('header.php');
checkUser();
adminArea();
$msg = "";
$username = "";
$password = "";
$label = "Add";

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $label = "Edit";
    $id = get_safe_value($_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM users WHERE id=$id");
    if (mysqli_num_rows($res) == 0) {
        redirect('users.php');
        die();
    }
    $row = mysqli_fetch_assoc($res);
    $username = $row['username'];
    $password = $row['password'];
}

if (isset($_POST['submit'])) {
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);
    $type = "add";
    $sub_sql = "";
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $type = "edit";
        $sub_sql = "AND id!=$id";
    }

    $res = mysqli_query($con, "SELECT * FROM users WHERE username='$username' $sub_sql");
    if (mysqli_num_rows($res) > 0) {
        $msg = "⚠️ Username already exists";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username,password,role) VALUES('$username','$password','User')";
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "UPDATE users SET username='$username',password='$password' WHERE id=$id";
        }
        mysqli_query($con, $sql);
        redirect('users.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TrackWise - <?php echo $label ?> User</title>
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease-in-out;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            animation: slideDown 1.2s ease-in-out;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 12px;
            border: none;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        input:focus {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        input[type="submit"] {
            background: #ff4b2b;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background: #ff5733;
            transform: scale(1.05);
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #ffcc00;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #ff6600;
        }

        #msg {
            font-weight: bold;
            margin-top: 10px;
            color: #00ff99;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo $label ?> User</h2>
        <a href="users.php">← Back to Users</a>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username" required placeholder="Enter Username" value="<?php echo $username ?>">

            <label for="password">Password</label>
            <input type="text" name="password" required placeholder="Enter Password" value="<?php echo $password ?>">

            <input type="submit" name="submit" value="Submit">
        </form>

        <div id="msg"><?php echo $msg ?></div>
    </div>

    <script>
        // Smooth animation on load and prevent form re-submission
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>

<?php include('footer.php'); ?>
