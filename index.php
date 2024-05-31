<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <title>Home</title>
</head>

<body>
    <div class="page_container">

        <?php
            require('pagine/header.php');
        ?>

        <div class="separatore"></div>
        
        <section class="cover">
            <img src="immagini/ballon-dor.png" alt="" class="cover_img">
        </section>
    

        <section class="text hidden-content">
            <div class="text__copy">
                <h1 class="text__titolo">Il Pallone D'oro</h1>
                <h2>Il premio più desiderato di tutti</h2>
                <p class="intro spaziatura_p">
                Il Pallone d'oro (Ballon d'Or in francese), noto in precedenza anche come Calciatore europeo dell'anno, 
                è un premio calcistico istituito nel 1956 dalla rivista sportiva francese France Football e assegnato annualmente 
                al giocatore che più si è distinto nella stagione sportiva, militando in una squadra di un qualsiasi campionato 
                del mondo.
                </p>
                <h3 class="align-center">I criteri di scelta</h3>
                <p>I criteri per l'assegnazione del premio sono descritti nell'articolo 10 del relativo regolamento:</p>
                <ul>
                    <li><p>Insieme delle prestazioni individuali e di squadra durante l'anno preso in considerazione</p></li>
                    <li><p>Valore del giocatore (talento e fair play)</p></li>
                    <li><p>Carriera</p></li>
                    <li><p>Personalità, carisma</p></li>
                </ul>
            </div>
        </section>
        


        <section class="cards cards-anim">
            <div class="card card1">
                <a href="pagine/pd2020.php">
                    <div class="card__block__image__lewa">
                        <img class="card__image"src="immagini/lewa.png" alt="">
                    </div>
                    <div class="card__copy__lewa">
                        <h3>E IL PALLONE D'ORO DEL 2020?</h3>
                        <p class="spaziatura_p">
                            Cosa successe nel 2020? Perché non è stato asseganto nessun pallone d'oro? Leggilo su questo
                            nostro articolo!
                        </p>
                    </div>
                </a>
            </div>
            <div class="card card2">
                <a href="https://www.youtube.com/watch?v=OvYdHyrJWBM&t=162s">
                    <div class="card__block__image">
                        <img class="card__image"src="immagini/logo.png" alt="">
                    </div>
                    <div class="card__copy">
                        <h3>PALLONI D'ORO RUBATI!</h3>
                        <p class="spaziatura_p">
                            Il premio del pallone d'oro è oggettivo? Ci sono mai stati dei palloni d'oro "rubati"? 
                            Scoprilo con questo video!
                        </p>
                    </div>
                </a>
            </div>
            <div class="card card3  ">
                <a href="pagine/quiz.php">
                    <div class="card__block__image">
                        <img class="card__image"src="immagini/quiz-img-card.jpeg" alt="">
                    </div>
                    <div class="card__copy">
                        <h3>IL QUIZ!</h3>
                        <p class="spaziatura_p">
                            Pensi di saperne abbastanza sui palloni d'oro? Prova a metterti in gioco con il nostro quiz!
                        </p>
                    </div>
                </a>
            </div>
        </section>
    
        <?php
            require('pagine/footer.php');
        ?>

    </div>

    <script src="script/script.js"></script>
    
</body>
</html>