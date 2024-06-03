<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

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
        if (isset($_POST['mi_aggiungo'])) {
            require("../db/connessionedb.php");
            $sql = "SELECT nome, cognome
                    FROM users
                    WHERE username = '$username'";
            $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");
        

            if ($ris->num_rows == 0) {
                echo "<p style='text-align: center; font-size: 30px;'>Utente o password non trovati.</p>";
                $conn->close();
            }
            else{
                $riga = $ris->fetch_assoc();
                $nome = $riga['nome'];
                $cognome = $riga['cognome'];
                echo <<< EOD
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="nome">Nome: </label></td>
                            <td><input type="text" name="nome" required id="nome" value="$nome" disabled='disabled'></td>
                        </tr>
                        <tr>
                            <td><label for="cognome">Cognome: </label></td>
                            <td><input type="text" name="cognome" required id="cognome" value="$cognome" disabled ='disabled'></td>
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
                            <td><input type="number" name="anno_vincita" required id="anno_vincita"></td>
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
                    <input type="submit" value='invia' name = "invia_dati">
                </form>
                EOD;

                if(isset($_POST['invia_dati'])){

                
            
        
                    $bla = 'SELECT anno
                            FROM edizioni';
                    $ris = $conn->query($bla) or die("<p>Query fallita! ".$conn->error."</p>");
            

                    if ($ris->num_rows == 0) {
                        echo "<p style='text-align: center; font-size: 30px;'>Utente o password non trovati.</p>";
                        $conn->close();
                    }
                    foreach($ris as $riga){
                        if($_POST["anno_vincita"] == $riga['anno']){
                            echo '<p> Anno già di una persona/calciatore </p>';
                            header('Refresh: 5; URL=aggiungiti.php');
                            die();
                        }
                    }
                    if(isset($_POST['nome'])){
                        $nome = $_POST['nome'];
                    }
                    if (isset($_POST['cognome'])) {
                        $cognome = $_POST['cognome'];
                    }
                    
                    if (isset($_POST['nazionalita'])) {
                        $nazionalita = $_POST['nazionalita'];
                    }
                    
                    if (isset($_POST['squadra'])) {
                        $squadra = $_POST['squadra'];
                    }
                    
                    if (isset($_POST['anno_vincita'])) {
                        $anno_vincita = $_POST['anno_vincita'];
                    }
                    
                    if (isset($_POST['descrizione'])) {
                        $descrizione = $_POST['descrizione'];
                    }
                    
                    if (isset($_POST['soprannome'])) {
                        $soprannome = $_POST['soprannome'];
                    }
                    
                    if (isset($_POST['testo'])) {
                        $testo = $_POST['testo'];
                    }
                    $myquery2 = "INSERT INTO giocatori (anno, id_giocatore, squadra, descrizione)
                                        VALUES ('$anno_vincita', '$squadra', '$descrizione')";
                        
                    $myquery3 = 'SELECT id_giocatore
                                FROM giocatori
                                ORDER BY id_giocatore DESC
                                LIMIT 1';
                    $riga = $myquery3->fetch_assoc();
                    $id = $riga['id_giocatore'];
                    $myquery = "INSERT INTO edizioni (anno, id_giocatore, squadra, descrizione)
                                        VALUES ('$anno_vincita', '$id', '$squadra', '$descrizione')";
                }
            }           
        }
    
    ?>


    
</body>
</html>