<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$recipe_id = intval($_POST['recipe_id']);
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$zdjecie_path = $_POST['zdjecie_path'];
$skladniki = $_POST['skladniki'];


$sql = "UPDATE przepisy SET nazwa = '$nazwa', opis = '$opis', zdjecie_path = '$zdjecie_path' WHERE idp = $recipe_id";
if ($conn->query($sql) === TRUE) {
    echo "Przepis został zaktualizowany.";
} else {
    echo "Błąd podczas aktualizacji przepisu: " . $conn->error;
}

$sql = "DELETE FROM detal_przepis WHERE p_id = $recipe_id";
$conn->query($sql);

foreach ($skladniki as $skladnik) {
    $s_id = $skladnik['s_id'];
    $ilosc = $skladnik['ilosc'];

    $sql = "INSERT INTO detal_przepis (p_id, s_id, ilosc) VALUES ($recipe_id, $s_id, '$ilosc')";
    $conn->query($sql);
}

$conn->close();
?>
