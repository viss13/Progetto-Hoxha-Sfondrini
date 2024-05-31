<?php
    if(basename($_SERVER['PHP_SELF']) == 'index.php'){
        echo <<< EOD
        <footer class="home-footer">
            <div class="sviluppatori">
                <div class="sviluppatori__ogg">
                    <p>GLI SVILUPPATORI</p>
                </div>
            </div>
            <section class="schede_sv">
                <div class="scheda">
                    <div class="flex_center">
                        <img class="scheda__image"src="immagini/diego_progetto_prova.png" alt="">
                    </div>
                    <div class="scheda__copy">
                        <h3>Diego Sfondrini</h3>
                        <p class="spaziatura_p">Diego da un stile creativo ai siti, cerca di trovare delle attività intrattenenti per gli utenti</p>
                        <div>
                            <a href="https://wa.me/3387675099?text=ciao vengo dal tuo sito" class="wa_ig_link">
                                <img src="immagini/whatsapp-icon.png" alt="" class="img-res">
                            </a>
                            <a href="https://www.instagram.com/diego.sfondrini/" class="wa_ig_link">
                                <img src="immagini/instagram-icon.png" alt="" class="img-res">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scheda">
                    <div class="flex_center">
                        <img class="scheda__image"src="immagini/vis_progetto_prova.png" alt="">
                    </div>
                    <div class="scheda__copy">
                        <h3>Visar Hoxha</h3>
                        <p class="spaziatura_p">Visar cerca di dare la migliore esperienza all'utenza, rende agevole ciò che non è agevole</p>
                        <div>
                            <a href="https://wa.me/3519633811?text=ciao vengo dal tuo sito" class="wa_ig_link">
                                <img src="immagini/whatsapp-icon.png" alt="" class="img-res">
                            </a>
                            <a href="https://www.instagram.com/viss.13/" class="wa_ig_link">
                                <img src="immagini/instagram-icon.png" alt="" class="img-res">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="separatore"></div>
        </footer>
        EOD;
    }
    else{
        echo '<footer>Progetto fatto da Visar Hoxha e Diego Sfondrini</footer>';
    }
?>