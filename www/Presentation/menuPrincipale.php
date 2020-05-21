<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: login.php");
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Accedi</title>
</head>

<body>
    <div id="canvas" class="card container-md">
        <div align='center'>
            <img id="logo" src="" alt="">
            <?php
                echo "<h2 align='center'>Benvenuto, " . $_SESSION['utenteConnesso']->getNome() . ".</h2>";
            ?>
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </div>
</body>

</html>