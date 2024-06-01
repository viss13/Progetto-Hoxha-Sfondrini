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
                    $sql = 'SELECT edizioni.foto, edizioni.anno, edizioni.id_giocatore, edizioni.squadra, 
                                    edizioni.descrizione, giocatori.nome, giocatori.cognome, giocatori.nazionalita
                            FROM edizioni JOIN giocatori ON edizioni.id_giocatore = giocatori.id_giocatore
                            ORDER BY edizioni.anno DESC';
                    
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
                                        <h4>$cognome $nome</h4>
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


                

                <!-- <section class="banner" id="2022">
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2022</h3>
                            <h4>Karim Benzema</h4>
                            <h5>Real Madrid / France</h5>
                            <p class="spaziatura_p">
                                Karim Benzema si aggiudica l'edizione 2022 del Pallone d'Oro. Come ampiamente previsto, 
                            il bomber del Real Madrid ha sbaragliato la concorrenza, ricevendo l'ambito trofeo direttamente
                             dalle mani di Zinedine Zidane, l'ultimo in Francia ad aver vinto il titolo nel 1998. Una grande 
                             rivincita per l'attaccante 
                                francese di origini algerine, diventato in poco più di un anno un vero re del calcio mondiale.
                            </p>
                        </div>
                    </div>
                    <a href="../pagine-giocatori/benzema.html" class="banner__img">
                        <img src="../immagini/2022.png" alt="">
                    </a>              
                </section>

                <section class="banner" id="2021">
                    <a href="../pagine-giocatori/messi.html" class="banner__img">
                        <img src="../immagini/2021.webp" alt="">
                    </a>                  
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2021</h3>
                            <h4>Lionel Messi</h4>
                            <h5>Barcelona / Argentina</h5>
                            <p class="spaziatura_p">
                                Il Pallone d'oro 2021 è stato consegnato
                                 il 29 novembre 2021 a Parigi ed è stato vinto da Lionel Messi, 
                                 al settimo successo nella storia del riconoscimento. 
                                 La pulce sorprende nuovamente tutti.
                            </p>                        
                        </div>
                    </div>
                </section>

                <section class="banner" id="2019">
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2019</h3>
                            <h4>Lionel Messi</h4>
                            <h5>Barcelona / Argentina</h5>
                            <p class="spaziatura_p">
                                Lionel Messi ha vinto il Pallone d’Oro 2019, precedendo Van Dijk e Cristiano Ronaldo.
                                Per il campione del Barcellona, premiato nel corso della cerimonia al Theatre du Chatelet di Parigi, 
                                si tratta del sesto Pallone d'Oro in carriera
                            </p>                         
                        </div>
                    </div>
                    <a href="../pagine-giocatori/messi.html" class="banner__img">
                        <img src="../immagini/2019.webp" alt="">
                    </a>           
                </section>

                <section class="banner" id="2018">
                    <a href="../pagine-giocatori/modric.html" class="banner__img">
                        <img src="../immagini/2018.jpg" alt="">
                    </a>                  
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2018</h3>
                            <h4>Luka Modric</h4>
                            <h5>Real Madrid / Croatia</h5>
                            <p class="spaziatura_p">
                                Il 33enne centrocampista croato, campione d'Europa con il Real Madrid e vicecampione 
                                del mondo con la Croazia, si aggiudica l'ambito trofeo che dal 2008 in poi aveva avuto solo due padroni:
                                Ronaldo e Messi.
                            </p>                           
                        </div>
                    </div>
                </section>


                <section class="banner" id="2017">
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2017</h3>
                            <h4>Cristiano Ronaldo</h4>
                            <h5>Real Madrid / Portugal</h5>
                            <p class="spaziatura_p">
                                Come da pronostico Cristiano Ronaldo ha vinto il Pallone d’oro 2017. Si tratta del secondo consecutivo,
                                 il 5° in carriera per l’attaccante portoghese che eguaglia il primato di Leo Messi.

                            </p>                        
                        </div>
                    </div>
                    <a href="../pagine-giocatori/ronaldo.html" class="banner__img">
                        <img src="../immagini/2017.avif" alt="">
                    </a>
                </section>
                

                <section class="banner" id="2016">
                    <a href="../pagine-giocatori/ronaldo.html" class="banner__img">
                        <img src="../immagini/2016.webp" alt="">
                    </a>
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2016</h3>
                            <h4>Cristiano Ronaldo</h4>
                            <h5>Real Madrid / Portugal</h5>
                            <p class="spaziatura_p">
                                Cristiano Ronaldo a trionfare per la quarta volta, dietro di lui Lionel Messi ed Antoine Griezmann. Erano trenta
                                 i giocatori in lizza per il Pallone d'Oro 2016, tra questi anche Gigi Buffon, unico italiano e nono nella
                                  classifica finale.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="banner" id="2015">
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2015</h3>
                            <h4>Lionel Messi</h4>
                            <h5>Barcelona / Argentina</h5>
                            <p class="spaziatura_p">
                                Per l’argentino del Barcellona si tratta del quinto trionfo della sua straordinaria carriera: sul podio, con lui, 
                                CR7, portoghese del Real Madrid, e Neymar, funambolo brasiliano compagno di squadra proprio di Messi
                                 al Barcellona. Queste le percentuali di voto: Messi 41.33 %, Ronaldo 27.76 %, Neymar 7.86 %.
                            </p>                        
                        </div>
                    </div>
                    <a href="../pagine-giocatori/messi.html" class="banner__img">
                        <img src="../immagini/2015.jpg" alt="">
                    </a>
                </section>

                <section class="banner" id="2014">
                    <a href="../pagine-giocatori/ronaldo.html" class="banner__img">
                        <img src="../immagini/2014.jpg" alt="">
                    </a>
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2014</h3>
                            <h4>Cristiano Ronaldo</h4>
                            <h5>Real Madrid / Portugal</h5>
                            <p class="spaziatura_p">
                                Il Pallone d'oro FIFA 2014 è stato consegnato il 12 gennaio 2015 a Zurigo a Cristiano Ronaldo.
                                 Il calciatore portoghese ha vinto il trofeo per la terza volta nella sua carriera, dopo i successi del 2008 e del 2013.
                            </p>                         
                        </div>
                    </div>
                </section>
                
                <section class="banner" id="2013">
                    <div class="banner__copy">
                        <div class="banner__copy__text">
                            <h3>2013</h3>
                            <h4>Cristiano Ronaldo</h4>
                            <h5>Real Madrid / Portugal</h5>
                            <p class="spaziatura_p">
                                Cristiano Ronaldo ha vinto il Pallone d’Oro 2013. 
                                Il fuoriclasse portoghese ha trionfato con 1.365 punti, precedendo Lionel Messi (1.205) e Franck Ribery (1.127).
                            </p>                         
                        </div>
                    </div>
                    <a href="../pagine-giocatori/ronaldo.html" class="banner__img">
                        <img src="../immagini/2013.jpg" alt="">
                    </a>
                </section> -->
                
            </main>

            <div class="sidenav">
				<h2 class="sidenav__titolo">Vincitori</h2>
                <div class="separatore"></div>
                <?php
                    $sql = 'SELECT anno
                            FROM edizioni
                            ORDER BY anno DESC';
                    $ris = $conn->query($sql) or die ('<p> problema con query </p>');
                    echo '<ul>';
                    foreach($ris as $riga){
                        $anno = $riga['anno'];
                        echo "<a href='#$anno'><li>$anno</li></a>";
                    }
                    echo'<ul>';
                ?>
				<!-- <ul>
					<a href="#2023"><li>2023</li></a>
					<a href="#2022"><li>2022</li></a>
					<a href="#2021"><li>2021</li></a>
					<a href="#2019"><li>2019</li></a>
					<a href="#2017"><li>2017</li></a>
					<a href="#2016"><li>2016</li></a>
                    <a href="#2015"><li>2015</li></a>
                    <a href="#2014"><li>2014</li></a>
                    <a href="#2013"><li>2013</li></a>
				</ul> -->
			</div>

        </div>

        <?php
            require('footer.php');
        ?>
    </div>
    
</body>
</html>