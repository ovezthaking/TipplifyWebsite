<?php
$servername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "tipplify";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="Assets\LOGO\Square44x44Logo.scale-200.png" type="image/x-icon">
    <title>Tipplify</title>
    <style>
        body {
            background-image: url("Assets/MainPageBackground.png");
            background-size: cover;
        }
    </style>
</head>
<body>
    
</body>
</html>
