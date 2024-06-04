<?php
	session_start();
    if(!isset($_SESSION['username'])){ 
        echo "<div class='separatore'></div>";
        echo "<p style = 'margin: auto;'>per accedere alla pagina devi essere loggato. tra  5 secondi sarai reindirizzato alla pagina di login.</p>";
        header('Refresh: 5; URL=login.php');
        die();
	}
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
?>


<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo"$nome $cognome"?></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php require("header.php");?>
	<div class="separatore"></div>
        
        <section class="cover">
            <div class="cover__filter"></div>
		    <div class="cover__caption">
                <h1><?php echo "$nome $cognome"?></h1>
                <h2><?php echo "$soprannome"?></h2>
		    </div>
           <?php echo "<img src='../immagini/$copertina' alt='$copertina' class='cover_img'>" ?> 
        </section>

        <section class="text">
            <div class="text__copy">
                <?php 
                    $paragrafi = explode("\n", $testo);
                    foreach ($paragrafi as $paragrafo) {
                        echo "<p>$paragrafo</p>";
                    }
                ?>
            </div>
        </section>
    
        <?php require("footer.php")?>


    </div>
    <script src="../script/script.js"></script>
    
</body>
</html>
<?php
	$conn->close();
?>