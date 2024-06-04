<?php
	session_start();
    if(isset($_SESSION['username'])){ 
        $username = $_SESSION['username'];
        require('../db/connessionedb.php');
        $myquery = "SELECT user_id
                    FROM users
                    WHERE username = '$username'";
        $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
        $riga = $ris->fetch_assoc();
        $user_id = $riga['user_id'];
    }else{
        $user_id = -1;
    }
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <title>Vincitori</title>
</head>

<body>
    <div class="page_container">
        
        
        <?php
            require('header.php');
        ?>
        <div style = 'height: 50px;'></div>
        

        <div class="centro-flex">
            
            <main>

                <?php
                    require('../db/connessionedb.php');
                    $sql = "SELECT edizioni.foto, edizioni.anno, edizioni.id_giocatore, edizioni.squadra, 
                                    edizioni.descrizione, giocatori.nome, giocatori.cognome, giocatori.nazionalita
                            FROM edizioni JOIN giocatori ON edizioni.id_giocatore = giocatori.id_giocatore
                            WHERE edizioni.user_id IS NULL OR edizioni.user_id = $user_id
                            ORDER BY edizioni.anno DESC";
                    
                    $ris = $conn->query($sql) or die ('<p> problema con query </p>');
                    $contatore = 0;


                    foreach($ris as $riga){
                        $foto = $riga['foto'];
                        $anno = $riga['anno'];
                        $id_giocatore = $riga['id_giocatore'];
                        $squadra = $riga['squadra'];
                        $descrizione = $riga['descrizione'];
                        $nome = $riga['nome'];
                        $cognome = $riga['cognome'];
                        $nazionalità = $riga['nazionalita'];

                        if($contatore % 2 == 0){
                            echo <<< EOD
                            <section class="banner" id="$anno">
                                <a href="scheda_giocatore.php?id_giocatore=$id_giocatore" class="banner__img">
                                    <div class="banner__img__filter"></div>
                                    <img src="../immagini/$foto" alt="">
                                </a>
                                <div class="banner__copy">
                                    <div class="banner__copy__text">
                                        <h3>$anno</h3>
                                        <h4>$nome $cognome</h4>
                                        <h5>$squadra / $nazionalità</h5>
                                        <p class="spaziatura_p">
                                            $descrizione
                                        </p>
                                    </div>
                                </div>  
                            </section>       
                            EOD;
                        }
                        else{
                            echo <<< EOD
                            <section class="banner" id="$anno">
                                <div class="banner__copy">
                                    <div class="banner__copy__text">
                                        <h3>$anno</h3>
                                        <h4>$cognome $nome</h4>
                                        <h5>$squadra / $nazionalità</h5>
                                        <p class="spaziatura_p">
                                            $descrizione
                                        </p>
                                    </div>
                                </div>
                                <a href="scheda_giocatore.php?id_giocatore=$id_giocatore" class="banner__img">
                                    <div class="banner__img__filter"></div>
                                    <img src="../immagini/$foto" alt="">
                                </a>
                            </section>
                            EOD;
                        }
                        $contatore ++;
                    }
                ?>
                
            </main>

            <div class="sidenav">
				<h2 class="sidenav__titolo">Vincitori</h2>
                <div class="separatore"></div>
                <?php
                    $sql = "SELECT anno
                            FROM edizioni
                            WHERE user_id IS NULL OR user_id = '$user_id'
                            ORDER BY anno DESC";
                    $ris = $conn->query($sql) or die ('<p> problema con query </p>');
                    echo '<ul>';
                    foreach($ris as $riga){
                        $anno = $riga['anno'];
                        echo "<a href='#$anno'><li>$anno</li></a>";
                    }
                    echo'<ul>';
                ?>
			</div>

        </div>

        <?php
            require('footer.php');
        ?>
    </div>
    
</body>
</html>