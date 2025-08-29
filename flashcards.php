<?php
require 'db.php';
session_start();
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM sets WHERE user_id=$user_id");
?>
<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <title>Dine Flashcards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="container py-5">
  <h1>Dine flashcards</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sæt navn</th>
        <th>Handlinger</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td>
          <a href="update_flashcard.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
          <a href="delete_flashcard.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          <a href="practice.php?id=<?= $row['id'] ?>" class="btn btn-success"><i class="fas fa-arrow-right"></i></a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <button class="btn btn-outline-secondary" onclick="window.location.href='index.php'">⬅ Tilbage</button>
</body>
</html>
