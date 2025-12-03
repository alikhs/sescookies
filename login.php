<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include 'config.php';

$error = '';

// Cek cookie
if(isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
    header("Location: dashboard.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if($result && $result->num_rows === 1){
        $_SESSION['username'] = $username;

        if($remember){
            setcookie('username', $username, time() + 86400); // 1 hari
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login</h3>
                    <?php if($error != '') echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input">
                            <label class="form-check-label">Remember Me</label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
