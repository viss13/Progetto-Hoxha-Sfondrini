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
                <table class = "tab_input">
                    <tr>
                        <td><label for="nome" class="label_2">Nome: </label></td>
                        <td><input type="text" name="nome" id="nome" value="$nome" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cognome" class="label_2">Cognome: </label></td>
                        <td><input type="text" name="cognome" id="cognome" value="$cognome" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="nazionalita" class="label_2">Nazionalità: </label></td>
                        <td><input type="text" name="nazionalita" id="nazionalita" required></td>
                    </tr>
                    <tr>
                        <td><label for="squadra" class="label_2">Squadra: </label></td>
                        <td><input type="text" name="squadra" id="squadra" required></td>
                    </tr>
                    <tr>
                        <td><label for="anno_vincita" class="label_2">Anno vincita: </label></td>
                        <td><input type="number" name="anno_vincita" id="anno_vincita" required></td>
                    </tr>
                    <tr>
                        <td><label for="descrizione" class="label_2">Piccola descrizione: </label></td>
                        <td><input type="text" name="descrizione" id="descrizione" required></td>
                    </tr>
                    <tr>
                        <td><label for="soprannome" class="label_2">Soprannome: </label></td>
                        <td><input type="text" name="soprannome" id="soprannome" required></td>
                    </tr>
                    <tr>
                        <td><label for="testo" class="label_2">Grande descrizione: </label></td>
                        <td><input type="text" name="testo" id="testo" required></td>
                    </tr>
                    <tr><td colspan = '2' style = "width: 0px;"><input type="hidden" name="nome" value="$nome"></td></tr>
                    <tr><td colspan = '2'><input type="hidden" name="cognome" value="$cognome"></td></tr>
                    <tr>
                        <td colspan = '2' style = "text-align: center; margin-top: 15px;"><input type="submit" value='Invia' name="invia_dati"></td>
                    </tr>
                </table>
                
                
                
            </form>
            EOD;
        }
    }
    elseif (isset($_POST['aggiungo_altri'])) {
        
        echo <<<EOD
        <form action="" method="post" enctype="multipart/form-data">
            <table class = "tab_input">
                <tr>
                    <td><label for="nome" class="label_2">Nome: </label></td>
                    <td><input type="text" name="nome" id="nome" required  ></td>
                </tr>
                <tr>
                    <td><label for="cognome" class="label_2">Cognome: </label></td>
                    <td><input type="text" name="cognome" id="cognome" required></td>
                </tr>
                <tr>
                    <td><label for="nazionalita" class="label_2">Nazionalità: </label></td>
                    <td><input type="text" name="nazionalita" id="nazionalita" required></td>
                </tr>
                <tr>
                    <td><label for="squadra" class="label_2">Squadra: </label></td>
                    <td><input type="text" name="squadra" id="squadra" required></td>
                </tr>
                <tr>
                    <td><label for="anno_vincita" class="label_2">Anno vincita: </label></td>
                    <td><input type="number" name="anno_vincita" id="anno_vincita" required></td>
                </tr>
                <tr>
                    <td><label for="descrizione" class="label_2">Piccola descrizione: </label></td>
                    <td><input type="text" name="descrizione" id="descrizione" required></td>
                </tr>
                <tr>
                    <td><label for="soprannome" class="label_2">Soprannome: </label></td>
                    <td><input type="text" name="soprannome" id="soprannome" required></td>
                </tr>
                <tr>
                    <td><label for="testo" class="label_2">Grande descrizione: </label></td>
                    <td><input type="text" name="testo" id="testo" required></td>
                </tr>
                <tr>
                    <td><label for="foto" class="label_2">Seleziona immagine da caricare: </label></td>
                    <td><input type="file" name="foto" id="foto"></td>
                </tr>
                <tr>
                    <td colspan = '2' style = "text-align: center; margin-top: 15px;"><input type="submit" value='Invia' name="invia_dati"></td>
                </tr>
            </table>
            
        </form>
        EOD;
    
    }

    if (isset($_POST['invia_dati'])) {
        require("../db/connessionedb.php");

        
        // Definire la directory di destinazione relativa
        $target_dir = "../immagini/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se il file è effettivamente un'immagine
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if ($check == false) {
                echo "File non è un'immagine.<br>";
                header('Refresh: 3; URL=aggiungiti.php');
                die(); 
            }
        }

        // Verifica se il file esiste già
        if (file_exists($target_file)) {
            echo "Spiacente, il file esiste già.<br>";
            header('Refresh: 3; URL=aggiungiti.php');
            die();
            
        }

        // Limita la dimensione del file
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Spiacente, il file è troppo grande.<br>";
            header('Refresh: 3; URL=aggiungiti.php');
            die();
            
        }

        // Permette solo alcuni formati di file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Spiacente, solo i file JPG, JPEG, PNG e GIF sono permessi.<br>";
            header('Refresh: 3; URL=aggiungiti.php');
            die();
            
        }

        // Verifica se $uploadOk è impostato a 0 a causa di un errore
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto = basename($_FILES["fileToUpload"]["name"]);
        } else {
            echo "Spiacente, c'è stato un errore nel caricamento del tuo file.<br>";
        }
        
        

        $anno_vincita = $conn->real_escape_string($_POST['anno_vincita']);
        $nazionalita = $conn->real_escape_string($_POST['nazionalita']);
        $squadra = $conn->real_escape_string($_POST['squadra']);
        $descrizione = $conn->real_escape_string($_POST['descrizione']);
        $soprannome = $conn->real_escape_string($_POST['soprannome']);
        $testo = $conn->real_escape_string($_POST['testo']);
        $nome = $conn->real_escape_string($_POST['nome']);
        $cognome = $conn->real_escape_string($_POST['cognome']);

        $bla = "SELECT anno 
                FROM edizioni 
                WHERE anno = '$anno_vincita'";
        $ris = $conn->query($bla) or die("<p>Query fallita! " . $conn->error . "</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Anno già presente per un'altra persona/calciatore</p>";
        } else {
            $myquery2 = "INSERT INTO giocatori (nome, cognome, nazionalita, soprannome, testo, copertina, banner) 
                        VALUES ('$nome', '$cognome', '$nazionalita', '$soprannome', '$testo', '$foto', '$foto')";
            if ($conn->query($myquery2) === TRUE) {
                $id = $conn->insert_id;
                $myquery = "INSERT INTO edizioni (anno, id_giocatore, squadra, descrizione, foto) 
                            VALUES ('$anno_vincita', '$id', '$squadra', '$descrizione', '$foto')";
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