<?php
require 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $set_name = trim($_POST['set_name']);

    $stmt = $conn->prepare("INSERT INTO sets (user_id, name) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $set_name);
    $stmt->execute();
    $set_id = $stmt->insert_id;

    foreach($_POST['term'] as $i => $term) {
        $definition = $_POST['definition'][$i];
        if(trim($term) && trim($definition)) {
            $st = $conn->prepare("INSERT INTO flashcards (set_id, term, definition) VALUES (?, ?, ?)");
            $st->bind_param("iss", $set_id, $term, $definition);
            $st->execute();
        }
    }
    
    header("Location: play.php?id=$set_id");
exit();

}
