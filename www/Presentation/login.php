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
    <title>Login</title>
</head>

<body>
    <div id="canvas" class="card container-md">
        <img id="logo" src="" alt="">
        <form action="scriptLogin.php" method="POST" class="container-sm" style="max-width: 300px">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Indirizzo email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
			<div align='center'>
				<button type="submit" class="btn btn-primary">Accedi</button>
			</div>
        </form>
        <?php
            if (isset($_GET['msg']) && $_GET['msg'] == 1) {
                echo "<h3 align='center'>Login errato.</h3>";
            }
            if (isset($_GET['msg']) && $_GET['msg'] == 2) {
                echo "<h3 align='center'>Account creato.</h3>";
            }
        ?>
        <p style="text-align: center; margin-top: 20px">Sei un nuovo utente? <a href="sceltaTipo.php">Registrati ora</a></p>
    </div>
</body>

</html>