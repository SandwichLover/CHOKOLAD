<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>C H O K O L A D</title>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">

    <link rel=stylesheet type="text/css" href="main.css">
    <link rel=stylesheet type="text/css" href="drops.css">
</head>

<body>
    <div id="contentContainer">
        <header>
            <div id="logoContainer">
                <p id="logo" onclick="location.href='index.php';">C H O K O L A D</p>
            </div>
            <div class="buttonRow">
                <div onclick="location.href='login.html';" class="buttonRowButton">LOG-IN</div>
                <div class="buttonRowButton" onclick="location.href='drops.html';">DROPS</div>
            </div>
        </header>
        <div id="mainContainer">
            <div id="stockContainer">
                <div class="wareContainer">
                    <img src="images/500x500.png" class="wareImage">
                    <p class="wareText">TEXT PLACEHOLDER</p>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>

<?php
session_start();
if (isset($_SESSION['user_ID']) == false) {
    header("Location: index.php");
}
?>
