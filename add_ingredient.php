<?php
include 'config.php';

session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nazwa'])) {
        $skladnik = isset($_POST['nazwa']) ? $_POST['nazwa'] : null;
        $jednostka = isset($_POST['jednostka']) ? $_POST['jednostka'] : null;


  


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "INSERT INTO skladnikii (skladnik, jednostka) VALUES ('$skladnik', '$jednostka')";

        if ($conn->query($sql) === TRUE) {
            echo "Skladnik dodany poprawnie.";
        } else {
            echo "Blad podczas dodawania skladnika: " . $conn->error;
        }

        
        $conn->close();
    }   
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dodawanie składnika</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a style="text-decoration: none;" class="nav" href="index.php">Strona Główna</a>
    <a style="text-decoration: none;" class="nav" href="add_recipe.php">Dodaj Przepis</a>
    <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="login.php">Zaloguj </a><?php endif; ?>
    <?php if ($user_id==null): ?><a style="text-decoration: none;" class="nav" href="register.php">Zarejestruj</a><?php endif; ?>
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


  <h1>Dodawanie składnika</h1>
  <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
  <label for="nazwa">Nazwa składnika:</label>
  <input type="text" id="nazwa" name="nazwa" required><br><br>
  <label for="jednostka">Jednostka składnika:</label>
  <input type="text" id="jednostka" name="jednostka" required><br><br>
  <input type="submit" value="Dodaj składnik">
  </form>
</body>
</html>