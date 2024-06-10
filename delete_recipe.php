<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$recipe_id = intval($_GET['id']);

// Sprawdź, czy użytkownik jest zalogowany
if (!$user_id) {
    die("Brak autoryzacji.");
}

// Sprawdź, czy przepis istnieje
$check_sql = "SELECT * FROM przepisy WHERE idp = $recipe_id";
$check_result = $conn->query($check_sql);
if ($check_result->num_rows == 0) {
    die("Przepis nie istnieje.");
}

// Usuń przepis
$delete_sql = "DELETE FROM detal_przepis WHERE p_id = $recipe_id";
$conn->query($delete_sql);
$delete_sql = "DELETE FROM sugerowanie WHERE p_id = $recipe_id";
$conn->query($delete_sql);
$delete_sql = "DELETE FROM przepisy WHERE idp = $recipe_id";
$conn->query($delete_sql);

// Przekieruj użytkownika na stronę główną
header("Location: index.php");
exit();
?>
