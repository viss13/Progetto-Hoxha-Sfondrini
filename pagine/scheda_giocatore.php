


<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Biblioteca - Scheda Libro</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <?php
    if(isset($_SESSION['username'])){
        session_start();
        $username = $_SESSION["username"];

        if (!isset($_GET["id_giocatore"])) {
            die("Errore! manca un parametro essenziale per il caricamento della pagina!");
        } else {
            $id_giocatore = $_GET["id_giocatore"];
            require("../db/connessionedb.php");
            $sql = "SELECT giocatori.nome, giocatori.cognome, giocatori.testo, giocatori.copertina, giocatori.soprannome 
                    FROM giocatori
                    WHERE id_giocatore=$id_giocatore"; 
            $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
            if ($ris->num_rows == 0) {
                // decidere che cosa fare
                die ("giocatore non trovato!");
            } else {
                $riga = $ris->fetch_assoc();
                $testo = $riga['testo'];
                $nome = $riga["nome"];
                $cognome = $riga["cognome"];
                $copertina = $riga["copertina"];
                $soprannome = $riga["soprannome"];
            }
        }
        require("header.php");
	    echo <<< EOD
        <div class="separatore"></div>
        
        <section class="cover">
            <div class="cover__filter"></div>
		    <div class="cover__caption">
                <h1>$nome $cognome</h1>
                <h2><?php echo "$soprannome"?></h2>
		    </div>
           <img src='../immagini/$copertina' alt='$copertina' class='cover_img'>
        </section>

        <section class="text hidden-content">
            <div class="text__copy">
        EOD;

        $paragrafi = explode("\n", $testo);
        foreach ($paragrafi as $paragrafo) {
            echo "<p>$paragrafo</p>";
        }
        echo <<< EOD
            </div>
        </section>
        EOD;
    
        require("footer.php");
    }
    else{
        echo "<p>devi essere loggato per vedere questa pagina, sarai reindirizzato in 5 secondi</p>";
		header('Refresh: 5; URL=login.php');
    }
    ?>
	



    <script src="../script/script.js"></script>
    
</body>
</html>
<?php
	$conn->close();
?>