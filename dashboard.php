<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="d-flex">
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Ini adalah halaman dashboard.</p>
</div>
</body>
</html>
