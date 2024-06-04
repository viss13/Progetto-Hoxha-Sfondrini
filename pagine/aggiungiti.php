<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['username'])) {
    echo "<div class='separatore'></div>";
    echo "<p style='margin: auto;'>Per accedere alla pagina devi essere loggato. Tra 5 secondi sarai reindirizzato alla pagina di login.</p>";
    header('Refresh: 5; URL=login.php');
    die();
}
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Persona</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <?php require('header.php'); ?>
    <div class="separatore"></div>
    <div class="separatore"></div>
    <h1 class="titolo_aggiungiti">AGGIUNGI UN VINCITORE!</h1>

    <div class="titoli_aggiungiti">
        <form action="" method="post">
            <input class="titolo_aggiungiti_2" type="submit" value="MI AGGIUNGO" name="mi_aggiungo">
            <input class="titolo_aggiungiti_2" type="submit" value="AGGIUNGO UN'ALTRA PERSONA" name="aggiungo_altri">
        </form>
    </div>

    <?php
    if (isset($_POST['mi_aggiungo'])) {
        require("../db/connessionedb.php");
        $sql = "SELECT nome, cognome FROM users WHERE username = '$username'";
        $ris = $conn->query($sql) or die("<p>Query fallita! " . $conn->error . "</p>");

        if ($ris->num_rows == 0) {
            echo "<p style='text-align: center; font-size: 30px;'>Utente non trovato.</p>";
            $conn->close();
        } else {
            $riga = $ris->fetch_assoc();
            $nome = $riga['nome'];
            $cognome = $riga['cognome'];
            echo <<<EOD
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="nome">Nome: </label></td>
                        <td><input type="text" name="nome" id="nome" value="$nome" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cognome">Cognome: </label></td>
                        <td><input type="text" name="cognome" id="cognome" value="$cognome" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="nazionalita">Nazionalità: </label></td>
                        <td><input type="text" name="nazionalita" id="nazionalita" required></td>
                    </tr>
                    <tr>
                        <td><label for="squadra">Squadra: </label></td>
                        <td><input type="text" name="squadra" id="squadra" required></td>
                    </tr>
                    <tr>
                        <td><label for="anno_vincita">Anno vincita: </label></td>
                        <td><input type="number" name="anno_vincita" id="anno_vincita" required></td>
                    </tr>
                    <tr>
                        <td><label for="descrizione">Piccola descrizione: </label></td>
                        <td><input type="text" name="descrizione" id="descrizione" required></td>
                    </tr>
                    <tr>
                        <td><label for="soprannome">Soprannome: </label></td>
                        <td><input type="text" name="soprannome" id="soprannome" required></td>
                    </tr>
                    <tr>
                        <td><label for="testo">Grande descrizione: </label></td>
                        <td><input type="text" name="testo" id="testo" required></td>
                    </tr>
                </table>
                <input type="hidden" name="nome" value="$nome">
                <input type="hidden" name="cognome" value="$cognome">
                <input type="submit" value='Invia' name="invia_dati">
            </form>
            EOD;
        }
    }

    if (isset($_POST['invia_dati'])) {
        require("../db/connessionedb.php");
        $anno_vincita = $_POST['anno_vincita'];
        $nazionalita = $_POST['nazionalita'];
        $squadra = $_POST['squadra'];
        $descrizione = $_POST['descrizione'];
        $soprannome = $_POST['soprannome'];
        $testo = $_POST['testo'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];

        $bla = "SELECT anno FROM edizioni WHERE anno = '$anno_vincita'";
        $ris = $conn->query($bla) or die("<p>Query fallita! " . $conn->error . "</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Anno già presente per un'altra persona/calciatore</p>";
        } else {
            $myquery2 = "INSERT INTO giocatori (nome, cognome, nazionalita, soprannome, testo) VALUES ('$nome', '$cognome', '$nazionalita', '$soprannome', '$testo')";
            if ($conn->query($myquery2) === TRUE) {
                $id = $conn->insert_id;
                $myquery = "INSERT INTO edizioni (anno, id_giocatore, squadra, descrizione) VALUES ('$anno_vincita', '$id', '$squadra', '$descrizione')";
                if ($conn->query($myquery) === TRUE) {
                    echo "<p>Tutto inserito! Controlla la pagina vincitori!</p>";
                } else {
                    echo "<p>Errore nell'inserimento in edizioni: " . $conn->error . "</p>";
                }
            } else {
                echo "<p>Errore nell'inserimento in giocatori: " . $conn->error . "</p>";
            }
        }
        $conn->close();
    }
    ?>
</body>
</html>