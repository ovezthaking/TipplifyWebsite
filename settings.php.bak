
<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$user_sql = "SELECT u.login, u.imie, u.nazwisko
                    FROM uzytkownicy u 
                    WHERE u.idu = $user_id";
$user_result = $conn->query($user_sql);
$user_row = $user_result->fetch_assoc(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_login = $_POST['current_login'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "SELECT haslo FROM uzytkownicy WHERE idu='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($current_password == $row['haslo']) {
        $update_sql = "UPDATE uzytkownicy SET login='$new_login', haslo='$new_password', imie='$firstname', nazwisko='$lastname' WHERE idu='$user_id'";
        $_SESSION['username'] = $new_login;
        if ($conn->query($update_sql) === TRUE) {
            echo "Zaktualizowano dane konta.";
        } else {
            echo "Błąd: " . $conn->error;
        }
    } else {
        echo "Nieprawidłowe obecne hasło.";
    }
    
    if (isset($_POST['delete_account'])) {
        $delete_sql = "DELETE FROM uzytkownicy WHERE idu='$user_id'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Konto zostało usunięte.";
            session_destroy();
            exit();
        } else {
            echo "Błąd: " . $conn->error;
        }
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <title>Ustawienia Konta</title>
</head>
<body>
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
        <h1>Ustawienia Konta</h1>
        <?php echo "Zalogowano jako ". $user_row["login"] ; ?>
        <form method="post" style="margin-top: 30px;">
                <label for="current_login">Login:</label><br>
                <input type="text" id="current_login" name="current_login" required value="<?php echo $user_row["login"]; ?>"><br>
                <label for="current_password">Obecne hasło:</label><br>
                <input type="password" id="current_password" name="current_password" required><br>
                <label for="new_password">Nowe hasło:</label><br>
                <input type="password" id="new_password" name="new_password" required><br>
                <label for="firstname">Imię:</label><br>
                <input type="text" id="firstname" name="firstname" value="<?php echo $user_row["imie"]; ?>"><br> 
                <label for="lastname">Nazwisko:</label><br>
                <input type="text" id="lastname" name="lastname" value="<?php echo $user_row["nazwisko"]; ?>"><br><br> 
                <input type="submit" value="Zaktualizuj dane">
        </form>
        
        <form method="post" style="margin-top:10px; ">
                <input type="hidden" name="delete_account" value="1">
                <input type="submit" value="Usuń konto" style="background-color: red; color: white;">
        </form>
</body>
</html>
