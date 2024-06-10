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
    <title>Edytuj przepis - <?php echo $recipe["nazwa"]; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a style="text-decoration: none;" class="nav" href="index.php">Strona Główna</a>
    <a style="text-decoration: none;" class="nav" href="dodaj_przepis.php">Dodaj Przepis</a>
    <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="login.php">Zaloguj </a><?php endif; ?>
    <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="register.php">Zarejestruj</a><?php endif; ?>
    <a style="text-decoration: none; " class="nav" href="settings.php">Ustawienia Konta</a>
    <?php if ($user_id): ?><a style="text-decoration: none; " class="nav" href="logout.php">Wyloguj</a><?php endif; ?>
    <br><br><br><br>
    <p> Witamy na stronie Tipplify, na której znajdziesz przepisy popularnych drinków, a także będziesz mógł pochwalić się własnymi recepturami!</p>
</nav>
<div class="logo"></div>
    <img src="Assets\LOGO\Square44x44Logo.scale-200.png" max-width="88px" max-height="88px"  id="logo" alt="logo" >
    <br>
    <h2>Tipplify</h2>
</div>
<h1>Edytuj przepis - <?php echo $recipe["nazwa"]; ?></h1>
<form action="update_recipe.php" method="post">
    <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
    <label for="nazwa">Nazwa:</label>
    <input type="text" name="nazwa" value="<?php echo $recipe["nazwa"]; ?>"><br><br>
    <label for="opis">Opis:</label>
    <textarea name="opis"><?php echo $recipe["opis"]; ?></textarea><br><br>
    <label for="zdjecie_path">Ścieżka zdjęcia:</label>
    <input type="text" name="zdjecie_path" value="<?php echo $recipe["zdjecie_path"]; ?>"><br><br>
    <h2>Składniki:</h2>
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
    <label for="nowy_skladnik">Nowy składnik:</label>
    <input type="text" name="nowy_skladnik"><br><br>
    <input type="submit" value="Zapisz zmiany">
</form>
</body>
</html>
