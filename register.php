<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Fejl: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <title>Registrer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h1>Opret bruger</h1>
  <form method="post">
    <input class="form-control mb-2" type="text" name="username" placeholder="Brugernavn" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Kodeord" required>
    <button class="btn btn-primary" type="submit">Registrer</button>
  </form>
  <p>Har du allerede en bruger? <a href="login.php">Log ind</a></p>
</body>
</html>
