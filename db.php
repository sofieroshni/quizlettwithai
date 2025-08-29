<?php
$host = "mysql18.unoeuro.coms";
$user = "sofieroshni_dk"; // ret til din db-bruger
$pass = "R4FA35tEDcgk2xe6fGbd ";     // ret til dit password
$dbname = "flashcards_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
