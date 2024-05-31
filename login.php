<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM uzytkownicy WHERE login='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password == $row['haslo']) {
      $_SESSION['user_id'] = $row['idu'];
      $_SESSION['username'] = $row['login'];
      echo "Zalogowano pomyślnie. Przejdź do <a href='index.php'>strony głównej</a>.";
    } else {
      echo "Nieprawidłowe hasło." ;
    }
  } else {
    echo "Nie znaleziono użytkownika." ;
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
<nav>
        <a style="text-decoration: none;" class="nav" href="index.php">Strona Główna</a>
        <a style="text-decoration: none;" class="nav" href="add_recipe.php">Dodaj Przepis</a>
        <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="login.php">Zaloguj </a><?php endif; ?>
        <a style="text-decoration: none;" class="nav" href="register.php">Zarejestruj</a>
        <a style="text-decoration: none; " class="nav" href="settings.php">Ustawienia Konta</a>
        <?php if ($user_id): ?><a style="text-decoration: none; " class="nav" href="logout.php">Wyloguj</a><?php endif; ?>
        <br><br><br><br>
        <p> Witamy na stronie Tipplify, na której znajdziesz przepisy popularnych drinków, a także będziesz mógł pochwalić się własnymi recepturami!</p>
    </nav>
    <div class="logo">
    <img src="Assets\LOGO\Square44x44Logo.scale-200.png" max-width="88px" max-height="88px"  id="logo" alt="logo" >
    <br>
    <h2>Tipplify</h2>
    </div>
    <h1>Logowanie</h1>
    <form method="post">
        <label for="username">Nazwa użytkownika:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Zaloguj">
    </form>
</body>
</html>
