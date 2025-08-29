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
  <title>Opret Flashcards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container py-5">
  <h2>Lav dine egne flashcards</h2>
  <form id="flashcardForm" method="post" action="save_flashcards.php">
    <fieldset id="inputs">
      <div class="mb-3 input-group">
        <input type="text" name="term[]" placeholder="Begreb" class="form-control">
        <input type="text" name="definition[]" placeholder="Definition" class="form-control">
      </div>
    </fieldset>

    <div class="mb-3">
      <input class="form-control" type="text" name="set_name" placeholder="Navngiv flashcardsættet" required>
    </div>

    <button type="button" class="btn btn-secondary" onclick="addNewInput()">+ Tilføj kort</button>
    <button type="submit" class="btn btn-pink">Gem flashcards og øv</button>
  </form>
</main>
<script src="flipcard.js"></script>
</body>
</html>
