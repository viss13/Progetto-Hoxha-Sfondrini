<?php
    session_start();
    if(!isset($_SESSION['username'])){ 
        echo "<div class='separatore'></div>";
        echo "<p style = 'margin: auto;'>per accedere alla pagina devi essere loggato. tra  5 secondi sarai reindirizzato alla pagina di login.</p>";
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
    <?php require('header.php');?>
    <div class="separatore"></div>
    <div class="separatore"></div>
    <h1 class="titolo_aggiungiti">AGGIUNGI UN VINCITORE!</h1>

    <div class="titoli_aggiungiti">
        <form action="" method="post">
            <input class="titolo_aggiungiti_2" type="submit" value='MI AGGIUNGO' name="mi_aggiungo">
            <input class = "titolo_aggiungiti_2"type="submit" value="AGGIUNGO UN'ALTRA PERSONA" name="aggiungo_altri">
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mi_aggiungo'])) {
            require("../db/connessionedb.php");
            $sql = "SELECT *
                    FROM users
                    WHERE username = '$username'";
            $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");
        

            if ($ris->num_rows == 0) {
                echo "<p style='text-align: center; font-size: 30px;'>Utente o password non trovati.</p>";
                $conn->close();
            }
            else{
                $riga = $ris->fetch_assoc();
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="nome">Nome: </label></td>
                            <td><input type="text" name="nome" required id="nome" value="$riga['nome']" disabled='disabled'></td>
                        </tr>
                        <tr>
                            <td><label for="cognome">Cognome: </label></td>
                            <td><input type="text" name="cognome" required id="cognome" value="$riga['cognome']" disabled ='disabled'></td>
                        </tr>
                        <tr>
                            <td><label for="nazionalità">Nazionalità: </label></td>
                            <td><input type="text" name="nazionalità" required id="nazionalità"></td>
                        </tr>
                        <tr>
                            <td><label for="squadra">Squadra: </label></td>
                            <td><input type="text" name="squadra" required id="squadra"></td>
                        </tr>
                        <tr>
                            <td><label for="anno_vincita">Anno vincita: </label></td>
                            <td><input type="text" name="anno_vincita" required id="anno_vincita"></td>
                        </tr>
                        <tr>
                            <td><label for="descrizione">Piccola descrizione: </label></td>
                            <td><input type="text" name="descrizione" required id="descrizione"></td>
                        </tr>
                        <tr>
                            <td><label for="soprannome">Soprannome: </label></td>
                            <td><input type="text" name="soprannome" required id="soprannome"></td>
                        </tr>
                        <tr>
                            <td><label for="testo">Grande descrizione: </label></td>
                            <td><input type="text" name="testo" required id="testo"></td>
                        </tr>
                    </table>
                    <input type="submit" value='invia'>
                </form>
                $bla = 'SELECT'
                if($_POST["anno_vincita"])

            }

            
            
        }
    ?>


    
</body>
</html>