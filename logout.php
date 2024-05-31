<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
echo "Wylogowano pomyślnie. Przejdź do <a href='index.php'>strony głównej</a>.";
?>
