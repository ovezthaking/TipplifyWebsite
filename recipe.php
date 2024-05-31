<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$recipe_id = intval($_GET['id']);

$sql = "SELECT * FROM przepisy WHERE idp = $recipe_id";
$recipe_result = $conn->query($sql);

$ingredients_sql = "SELECT s.skladnik, dp.ilosc, s.jednostka
                    FROM detal_przepis dp
                    JOIN skladnikii s ON dp.s_id = s.ids
                    WHERE dp.p_id = $recipe_id";
$ingredients_result = $conn->query($ingredients_sql);

if ($recipe_result->num_rows > 0) {
    $recipe = $recipe_result->fetch_assoc();
} else {
    die("Przepis nie znaleziony.");
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $recipe["nazwa"]; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a style="text-decoration: none;" class="nav" href="index.php">Strona Główna</a>
    <a style="text-decoration: none;" class="nav" href="dodaj_przepis.php">Dodaj Przepis</a>
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
    <h1><?php echo $recipe["nazwa"]; ?></h1>
    <p><?php echo "<div id='opis'>" . nl2br($recipe["opis"] . "</div>"); ?></p>
    <img src="<?php echo $recipe["zdjecie_path"]; ?>" alt="<?php echo $recipe["nazwa"]; ?>">
    <div id="ingredients">
    <h2 style="color:white;">Składniki</h2>
    <ul>
        <?php
        if ($ingredients_result->num_rows > 0) {
            while($row = $ingredients_result->fetch_assoc()) {
                echo "<li>" . $row["ilosc"] . " " . $row["jednostka"] . " " . $row["skladnik"] . "</li>";
            }
        } else {
            echo "Brak składników";
        }
        ?>
    </ul>
    </div>
</body>
</html>

<?php
$dbuser_id= $_SESSION['user_id'];
$dbrecipe_id = $recipe["idp"];
if ($user_id) {
    $check_sql = "SELECT * FROM sugerowanie WHERE p_id = $dbrecipe_id AND u_id = $dbuser_id";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        $update_sql = "UPDATE sugerowanie SET ilosc_wejsc = ilosc_wejsc + 1, data = NOW() WHERE p_id = $dbrecipe_id AND u_id = $dbuser_id";
        $conn->query($update_sql);
    } else {
        $insert_sql = "INSERT INTO sugerowanie (p_id, u_id, ilosc_wejsc, data) VALUES ($dbrecipe_id, $dbuser_id, 1, NOW())";
        $conn->query($insert_sql);
    }
}
$conn->close();
?>

