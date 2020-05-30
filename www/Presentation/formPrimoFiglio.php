<?php
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
    }
?>
<h3 align='center'>Inserisci i dati di tuo figlio.</h2>

<form action="scriptRegistrazioneFiglio.php" method="POST" class="container-sm" style="max-width: 400px">
    <div class="form-row form-group">
        <div class="col">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required>
        </div>
        <div class="col">
            <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
        </div>
    </div>
    <div class="form-group">
        <input type="date" name="dataNascita" class="form-control" placeholder="Data di nascita" required>
    </div>
    <h5 align='center'>Potrai aggiungerne altri in seguito.</h4>
    <div class="mt-2" align='center'>
        <button type="submit" class="btn btn-primary">Conferma</button>
    </div>
</form>
