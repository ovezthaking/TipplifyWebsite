<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$recipe_id = intval($_GET['id']);

$sql = "SELECT * FROM przepisy WHERE idp = $recipe_id";
$recipe_result = $conn->query($sql);

$ingredients_sql = "SELECT s.ids, s.skladnik, dp.ilosc, s.jednostka
                    FROM detal_przepis dp
                    JOIN skladnikii s ON dp.s_id = s.ids
                    WHERE dp.p_id = $recipe_id";
$ingredients_result = $conn->query($ingredients_sql);

if ($recipe_result->num_rows > 0) {
    $recipe = $recipe_result->fetch_assoc();
} else {
    die("Przepis nie znaleziony.");
}


$sql = "SELECT * FROM skladnikii";
$result = $conn->query($sql);
$skladniki = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $skladniki[$row["ids"]] = $row["skladnik"];
    }
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
    <label for="skladniki">Składniki:</label>
    <label style="margin-left:11.5%;" for="ilosc">Ilość:</label><br>
    <div id="skladniki-container">
    
        <?php
        if ($ingredients_result->num_rows > 0) {
            $skladnikiCount = 0;
            while($row = $ingredients_result->fetch_assoc()) {
                
                ?>
                    
                <select name="skladniki[<?php echo $skladnikiCount; ?>][s_id]">
                    <?php foreach ($skladniki as $id => $skladnik) { ?>
                        <option value="<?php echo $id; ?>" <?php if ($id == $row["ids"]) echo "selected"; ?>><?php echo $skladnik; ?></option>
                    <?php } ?>
                    <?php  { ?>
                    <option value="<?php echo $id; ?>"><?php echo $skladnik; ?></option>
                    
                <?php } ?>
                </select>
                
                <input value="<?php echo $row["ilosc"]; ?>" type="text" name="skladniki[<?php echo $skladnikiCount; ?>][ilosc]" required><br><br>
                <?php
                $skladnikiCount++;
            }
            
        }
         else {
            echo "Brak składników";
        }
        ?>
        </div>
        <button type="button" onclick="addSkladnik()">Dodaj składnik</button>
        <button type="button" onclick="deleteSkladnik()" style="color:white; background-color:red; border-color:white;">Usuń składnik</button><br><br>
    </ul>
    

        <input type="submit" value="Zapisz zmiany">
    
    </form>
    <br>
    <form method="POST" action="add_ingredient.php" target="_blank">
        <p><label for="question">Nie znalazłeś składnika?</label><br>
        <input type="submit" value="Dodaj własny składnik"></input></p>
    </form>
   
</form>




<script>
        var skladnikiCount = 1;

        function addSkladnik() {
            var container = document.getElementById("skladniki-container");

            var select = document.createElement("select");
            select.name = "skladniki[" + skladnikiCount + "][s_id]";
            container.appendChild(select);

            <?php foreach ($skladniki as $id => $skladnik) { ?>
                var option = document.createElement("option");
                option.value = "<?php echo $id; ?>";
                option.text = "<?php echo $skladnik; ?>";
                select.appendChild(option);
            <?php } ?>

            var input = document.createElement("input");
            input.type = "text";
            input.name = "skladniki[" + skladnikiCount + "][ilosc]";
            input.required = true;
            container.appendChild(input);

            container.appendChild(document.createElement("br"));
            container.appendChild(document.createElement("br"));

            skladnikiCount++;
        }
        function deleteSkladnik() {
            var container = document.getElementById("skladniki-container");
            container.removeChild(container.lastChild);
            container.removeChild(container.lastChild);
            container.removeChild(container.lastChild);
            container.removeChild(container.lastChild);
            
            skladnikiCount--;
        }
    </script>
</body>
</html>


