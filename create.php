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
  <style>
    .flashcard-input { display: flex; gap: 8px; margin-bottom: 10px; }
    .flashcard-input input { flex: 1; max-width: 40%; }
    .flashcard-input button { flex: 0; }
  </style>
</head>
<body>
<main class="container py-5">
  <h2>Lav dine egne flashcards</h2>
  <form id="flashcardForm" method="post" action="save_flashcards.php">
    <fieldset id="inputs">
      <!-- 3 inputfelter som standard -->
      <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="flashcard-input input-group">
          <input type="text" name="term[]" placeholder="Begreb" class="form-control" required>
          <input type="text" name="definition[]" placeholder="Definition" class="form-control" required>
          <button type="button" class="btn btn-danger" onclick="removeInput(this)">Slet</button>
        </div>
      <?php endfor; ?>
    </fieldset>

    <div class="mb-3">
      <input class="form-control" type="text" name="set_name" placeholder="Navngiv flashcardsættet" required>
    </div>

    <button type="button" class="btn btn-secondary" onclick="addNewInput()">+ Tilføj kort</button>
    <button type="submit" class="btn btn-success">Gem flashcards og øv</button>
  </form>
</main>

<script>
  function addNewInput() {
    const container = document.getElementById('inputs');
    const div = document.createElement('div');
    div.className = 'flashcard-input input-group';
    div.innerHTML = `
      <input type="text" name="term[]" placeholder="Begreb" class="form-control" required>
      <input type="text" name="definition[]" placeholder="Definition" class="form-control" required>
      <button type="button" class="btn btn-danger" onclick="removeInput(this)">Slet</button>
    `;
    container.appendChild(div);
  }

  function removeInput(button) {
    button.parentElement.remove();
  }
</script>
</body>
</html>
