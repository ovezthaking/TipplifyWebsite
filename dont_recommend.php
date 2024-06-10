<?php
include 'config.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($user_id) {
    if (isset($_GET['id'])) {
        $recipe_id = $_GET['id'];
        
        $delete_sql = "DELETE FROM sugerowanie WHERE u_id = $user_id AND p_id = $recipe_id";
        
        if ($conn->query($delete_sql) === TRUE) {
            echo "Nie będziemy polecać tego przepisu więcej.";
        } else {
            echo "Błąd: " . $conn->error;
        }
    } else {
        echo "Niewłaściwy ID przepisu";
    }
} else {
    echo "Użytkownik nie jest zalogowany";
}
header("Location: index.php");
?>
