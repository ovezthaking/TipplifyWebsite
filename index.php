<?php
include 'config.php';
session_start();

$sql = "SELECT * FROM przepisy";
$result = $conn->query($sql);

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$recent_sql = $popular_sql = "";

if ($user_id) {
  $recent_sql = "SELECT p.idp, p.nazwa, p.zdjecie_path, v.data
       FROM przepisy p
       JOIN sugerowanie v ON p.idp = v.p_id
       WHERE v.u_id = $user_id
       ORDER BY v.data DESC
       LIMIT 5";
  
  $popular_sql = "SELECT p.idp, p.nazwa, p.zdjecie_path, v.ilosc_wejsc
      FROM przepisy p
      JOIN sugerowanie v ON p.idp = v.p_id
      WHERE v.u_id = $user_id
      ORDER BY v.ilosc_wejsc DESC
      LIMIT 5";
  } else {
  $recent_sql = "";
  $popular_sql = "";
  }
?>  

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Lista Przepisów</title>
  <link rel="stylesheet" href="styles.css">
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
  
  <style>
    .menu {
      height: 600px;
      overflow-y: scroll;
    }
  </style>

<?php if ($user_id): ?>
  
    
  <div>
    <ul style="float: right; width:60%; margin-top:50px;">
    <h2 style="color:white">Ostatnio odwiedzone przepisy</h2>
      <?php
      $recent_result = $conn->query($recent_sql);
      if ($recent_result->num_rows > 0) {
        while ($row = $recent_result->fetch_assoc()) {
          echo "<li style='width:75%;'><a id='". $row["idp"] . "' href='recipe.php?id=" . $row["idp"] . "'>" . $row["nazwa"] . "</a>". "<br><br>" . $row["data"] . "<img style='margin-left:60%;width:150px; height:150px;' src='" . $row["zdjecie_path"] . "' alt='zdjecie_przepisu'></li>";
        }
      } else {
        echo "Brak ostatnio odwiedzanych przepisów.";
      }
      ?>
    </ul>
  </div>

  
  <div>
    <ul style="float: right; width:60%;">
    <h2 style="color:white">Najczęściej odwiedzane przepisy</h2>
      <?php
      $popular_result = $conn->query($popular_sql);
      if ($popular_result->num_rows > 0) {
        while ($row = $popular_result->fetch_assoc()) {
          echo "<li style='width:75%'><a id='". $row["idp"] . "' href='recipe.php?id=" . $row["idp"] . "'>" . $row["nazwa"] . "</a>". "<br> ". "Odwiedziny: " . $row["ilosc_wejsc"] . "<img style='margin-left:60%;width:150px; height:150px;' src='" . $row["zdjecie_path"] . "' alt='zdjecie_przepisu'></li>";
        }
      } else {
        echo "Brak najczęściej odwiedzanych przepisów.";
      }
      ?>
    </ul>
  </div>

<?php endif; ?>

  <h1>Lista Przepisów</h1>
  <div class="menu">
    <ul>
      <?php
      if ($result->num_rows > 0) {
        $sql = "SELECT * FROM przepisy ORDER BY nazwa ASC";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
          echo "<li><a id='". $row["idp"] . "' href='recipe.php?id=" . $row["idp"] . "'>" . $row["nazwa"] . "</a></li>";
        }
      } else {
        echo "Brak przepisów";
      }
      ?>
    </ul>
  </div>
  
  

</body>
</html>

