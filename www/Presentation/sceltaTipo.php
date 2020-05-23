<?php
    session_start();
    if (isset($_SESSION['utenteConnesso'])) {
        header("Location: menuPrincipale.php");
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrazione</title>
</head>

<body>
    <div id="canvas" class="card container-md">
        <img id="logo" src="" alt="">
        <h2 align='center'>Registrati come:</h2>
        
        <div class="row px-lg-4">
            
            <div align="center" class="card col-md">
                <img src="..\..\resources\img\genitori2.svg" alt="" class="img-tipo-utente">
                <a class="stretched-link" href="registrazione.php?tipo=1">
                    <h2 align='center'>Genitore</h2>
                </a>
            </div>
            
            <div align="center" class="card col-md">
            <img src="..\..\resources\img\psicologo2.svg" alt="" class=" img-tipo-utente">
                <a class="stretched-link" href="registrazione.php?tipo=2">
                    <h2 align='center'>Psicologo</h2>
                </a>
            </div>
            
            <div align="center" class="card col-md">
                <img src="..\..\resources\img\pediatra2.svg" alt="" class=" img-tipo-utente">
                <a class="stretched-link" href="registrazione.php?tipo=3">
                    <h2 align='center'>Pediatra</h2>
                </a>
            </div>  
        </div>
        <p style="text-align: center; margin-top: 20px">Sei già registrato? <a href="login.php">Accedi ora</a></p>
    </div>
</body>

</html>