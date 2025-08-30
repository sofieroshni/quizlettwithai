Indhold af quizlettmedchatgpt/play.php på sofieroshni.dk Encoding: UTF-8



 
1
<?php
2
require 'db.php';
3
session_start();
4
if(!isset($_SESSION['user_id'])) {
5
  header("Location: login.php");
6
  exit;
7
}
8
​
9
$set_id = intval($_GET['id']);
10
$res = $conn->prepare("SELECT term, definition FROM flashcards WHERE set_id=?");
11
$res->bind_param("i", $set_id);
12
$res->execute();
13
$result = $res->get_result();
14
$cards = $result->fetch_all(MYSQLI_ASSOC);
15
?>
16
<!DOCTYPE html>
17
<html lang="da">
18
<head>
19
  <meta charset="UTF-8">
20
  <title>Spil flashcards</title>
21
  <!-- FontAwesome CDN -->
22
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
23
  <link rel="stylesheet" href="play.css">
24
</head>
25
<body>
26
  <h2 class="mb-4 text-center">Øv dine flashcards</h2>
27
​
28
  <div class="slider-container">
29
    <button class="nav-btn prev"><i class="fas fa-arrow-left"></i></button>
30
    <div class="slider" id="slider">
31
      <?php foreach($cards as $card): ?>
32
        <div class="slide">
33
          <div class="flashcard" onclick="flipCard(this)">
34
            <div class="card-inner">
35
              <div class="card-front"><?= htmlspecialchars($card['term']) ?></div>
36
              <div class="card-back"><?= htmlspecialchars($card['definition']) ?></div>
37
            </div>
38
          </div>
39
        </div>
40
      <?php endforeach; ?>
41
    </div>
42
    <button class="nav-btn next"><i class="fas fa-arrow-right"></i></button>
43
  </div>
44
​
45
  <div class="text-center mt-4">
46
    <a href="flashcards.php" class="btn-gray">Dine gemte flashcards</a>
47
  </div>
48
​
49
  <script src="play.js"></script>
50
</body>
51
</html>
52
​
