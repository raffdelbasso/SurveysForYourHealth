<?php
    session_start();
    if (isset($_SESSION['utenteConnesso'])) {
        header("Location: menuPrincipale.php");
    }
?>
<html lang="en">

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
        <h2 align='center'>Registrazione</h2>
        
        <form action="scriptRegistrazione.php" method="POST" class="container-sm" style="max-width: 300px">
            <input type="hidden" name="tipoUtente" value=<?php echo $_GET['tipo']; ?>>
            <div class="form-group">
                <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Indirizzo email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
			<div align='center'>
				<button type="submit" class="btn btn-primary">Registrati</button>
			</div>
        </form>
        <?php
            if (isset($_GET['errore'])) {
                echo "<h3 align='center'>Email già utilizzata.</h3>";
            }
        ?>
        <p style="text-align: center; margin-top: 20px">Sei già registrato? <a href="login.php">Accedi ora</a></p>
    </div>
</body>

</html>