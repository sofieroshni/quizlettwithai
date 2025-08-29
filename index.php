<?php
session_start();
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <title>Flashcards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="bg-primary text-white text-center py-4">
  <h1>Velkommen til Flashcards</h1>
</header>

<main class="container my-5 text-center">
  <button class="btn btn-success btn-lg" onclick="window.location.href='create.php'">Opret flashcards</button>
  <button class="btn btn-outline-primary btn-lg" onclick="window.location.href='flashcards.php'">Se dine flashcards</button>
  <br><br>
  <a href="logout.php">Log ud</a>
</main>
</body>
</html>
