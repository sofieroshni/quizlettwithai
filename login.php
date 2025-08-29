<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");
        exit;
    } else {
        $error = "Forkert login";
    }
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h1>Log ind</h1>
  <?php if(!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
  <form method="post">
    <input class="form-control mb-2" type="text" name="username" placeholder="Brugernavn" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Kodeord" required>
    <button class="btn btn-primary" type="submit">Log ind</button>
  </form>
  <p>Ingen bruger? <a href="register.php">Registrer</a></p>
</body>
</html>
