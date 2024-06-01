<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obsługa formularza dodawania przepisu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $skladniki = $_POST["skladniki"];
    $photo_path = $_POST["zdjecie"];

    // Dodawanie przepisu do tabeli "przepisy"
    $sql = "INSERT INTO przepisy (nazwa, opis, zdjecie_path) VALUES ('$nazwa', '$opis', '$photo_path')";
    if ($conn->query($sql) === TRUE) {
        $przepisId = $conn->insert_id;

        // Dodawanie składników przepisu do tabeli "detal_przepis"
        foreach ($skladniki as $skladnik) {
            $s_id = $skladnik["s_id"];
            $ilosc = $skladnik["ilosc"];

            $sql = "INSERT INTO detal_przepis (s_id, p_id, ilosc) VALUES ('$s_id', '$przepisId', '$ilosc')";
            $conn->query($sql);
        }

        echo "Przepis został dodany!";
    } else {
        echo "Błąd podczas dodawania przepisu: " . $conn->error;
    }
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
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Dodaj przepis</title>
</head>
<body style="color: white;">
        <nav>
            <a style="text-decoration: none;" class="nav" href="index.php">Strona Główna</a>
            <a style="text-decoration: none;" class="nav" href="add_recipe.php">Dodaj Przepis</a>
            <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="login.php">Zaloguj </a><?php endif; ?>
            <?php if ($user_id ==null): ?><a style="text-decoration: none;" class="nav" href="register.php">Zarejestruj</a><?php endif; ?>
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
    <h1>Dodaj przepis</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nazwa">Nazwa przepisu:</label>
        <input type="text" name="nazwa" required><br><br>

        <label for="opis">Opis przepisu:</label>
        <textarea name="opis" required></textarea><br><br>

        <label for="zdjecie">Ścieżka do zdjęcia:</label>
        <input type="text" name="zdjecie" required><br><br>

        <label for="skladniki">Składniki:</label><br>
        <div id="skladniki-container"></div>
            <select name="skladniki[0][s_id]">
                <?php foreach ($skladniki as $id => $skladnik) { ?>
                    <option value="<?php echo $id; ?>"><?php echo $skladnik; ?></option>
                    
                <?php } ?>
            </select>
            <input type="text" name="skladniki[0][ilosc]" required><br><br>
            
        </div>
        <button type="button" onclick="addSkladnik()">Dodaj składnik</button>
        <button type="button" onclick="deleteSkladnik()" style="color:white; background-color:red; border-color:white;">Usuń składnik</button><br><br>
        <input type="submit" value="Dodaj przepis">
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

<?php
$conn->close();
?>
