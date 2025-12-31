<?php
session_start();
if (!isset($_SESSION['id'])){
  header("location: login_usuario.php");
  die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Logado</h1>
    <div>Meus parabéns, você logou</div>
</body>
</html>