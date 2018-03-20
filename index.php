<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>C H O K O L A D</title>

    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">

    <link rel=stylesheet type="text/css" href="main.css">
    <link rel=stylesheet type="text/css" href="index.css">
</head>

<body>
    <div id="contentContainer">
        <header>
            <div id="logoContainer">
                <p id="logo" onclick="location.href='index.php';">C H O K O L A D</p>
            </div>
            <div class="buttonRow">
                <?php
                session_start();
                if (isset($_SESSION['user_ID'])) {
                    echo '<div onclick="location.href=\'logout.php\';" class="buttonRowButton">LOG-UD</div>';
                    echo '<div onclick="location.href=\'drops.php\';" class="buttonRowButton">DROPS</div>';
                } else {
                    echo '<div onclick="location.href=\'login.html\';" class="buttonRowButton">LOG-IN</div>';
                    echo '<div class="buttonRowButton" onclick="location.href=\'login.html\';">DROPS</div>';
                }
                ?>
            </div>
        </header>
        <div id="mainContainer">
            <div id="mainImageContainer">
                <img id="mainImage" src="images/main.jpg">
            </div>
            <br>
            <div id="countdown">00:00:00:00</div>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>
