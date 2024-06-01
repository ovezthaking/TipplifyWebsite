<?php
include 'config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obsługa formularza dodawania przepisu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $skladniki = $_POST["skladniki"];

    // Dodawanie przepisu do tabeli "przepisy"
    $sql = "INSERT INTO przepisy (nazwa, opis) VALUES ('$nazwa', '$opis')";
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
    <title>Dodaj przepis</title>
</head>
<body style="color: white;">
    <h1>Dodaj przepis</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nazwa">Nazwa przepisu:</label>
        <input type="text" name="nazwa" required><br><br>

        <label for="opis">Opis przepisu:</label>
        <textarea name="opis" required></textarea><br><br>

        <label for="skladniki">Składniki:</label><br>
        <div id="skladniki-container"></div>
            <select name="skladniki[0][s_id]">
                <?php foreach ($skladniki as $id => $skladnik) { ?>
                    <option value="<?php echo $id; ?>"><?php echo $skladnik; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="skladniki[0][ilosc]" required><br><br>
        </div>
        <button type="button" onclick="addSkladnik()">Dodaj składnik</button><br><br>

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
    </script>
</body>
</html>

<?php
// Zamykanie połączenia z bazą danych
$conn->close();
?>
