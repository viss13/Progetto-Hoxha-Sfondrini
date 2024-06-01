<?php
    if (!isset($_GET["id_giocatore"])) {
        die("Errore! manca un parametro essenziale per il caricamento della pagina!");
    } else {
        $id_giocatore = $_GET["id_giocatore"];
        require("../data/connessionedb.php");
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
            $descrizione_txt = $riga['descrizione_txt'];
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
    <title>Biblioteca - Scheda Libro</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php require("nav.php");?>
	<div class="separatore"></div>
        
        <section class="cover">
            <div class="cover__filter"></div>
		    <div class="cover__caption">
                <h1><?php echo "$nome $cognome"?></h1>
                <h2><?php echo "$soprannome"?></h2>
		    </div>
            <img src="../immagini/keegan2.jpg" alt="" class="cover_img">
        </section>

        <section class="text hidden-content">
            <div class="text__copy">
                <h1 class="text__titolo">Striker</h1>
                <p class="spaziatura_p">
                    Joseph Kevin Keegan, noto semplicemente come Kevin Keegan, (in inglese: 'kɛvɪn 'ki:gan; Armthorpe, 14 febbraio 1951) è un ex allenatore 
                    di calcio ed ex calciatore inglese, di ruolo attaccante.
                    Considerato come uno dei più forti calciatori inglesi della storia del calcio, occupa la 56ª posizione nella speciale classifica 
                    dei migliori calciatori del XX secolo pubblicata dalla rivista World Soccer e la 38ª posizione nell'omonima classifica stilata dall'IFFHS. 
                    Nel marzo del 2004, Pelé lo ha anche inserito nella FIFA 100, la lista dei 125 migliori calciatori viventi, redatta in occasione del Centenario 
                    della FIFA. Vincitore del Pallone d'oro per due anni di seguito (1978 e 1979), è stato inserito in totale per quattro volte tra i 
                    candidati alla vittoria del premio arrivando a raggiungere anche la seconda posizione nel 1977.
                    Ha raggiunto i maggiori successi negli anni in cui militò nel Liverpool, vincendo, tra il resto, tre volte il campionato inglese, 
                    due volte la Coppa Uefa ed una volta la Coppa dei Campioni. Militò inoltre anche nell'Amburgo, dove vinse un campionato tedesco.
                </p>
                <h2>Biografia</h2>
                <p class="spaziatura_p">
                    All'età di ventitré anni, il 23 settembre 1974 si è sposato con Jean, da cui ha avuto le figlie Laura e Sarah.
                </p>
            </div>
        </section>
    
        <footer>Progetto fatto da Visar Hoxha e Diego Sfondrini</footer>


    </div>
    <script src="../script/script.js"></script>
    
</body>
</html>
<?php
	$conn->close();
?>