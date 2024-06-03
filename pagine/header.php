<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    if(basename($_SERVER['PHP_SELF']) == 'index.php'){
        echo <<< EOD
        <header class="w-100">
            <div class="header__logo1">
                <img src="immagini/logo.png" alt="Logo">
            </div>
            <nav>
                <div class="header__tenda">
                    <a href="index.php" class="header__tenda__li">Home</a>
                </div>
                <div class="header__tenda">
                    <a href="pagine/giocatori.php" class="header__tenda__li">Vincitori</a>
                </div>
                <div class="header__tenda">
                    <a href="pagine/storia.php" class="header__tenda__li">Storia</a>
                </div>
                
            </nav>
            <div class="header__logo2">   
                <div class = "header__logo2__cerca">
                    <a href="pagine/cerca.php"><img src="immagini/cerca2.png" alt=""></a>
                </div>      
                <div class = "header__logo2__login">
                    <a href="pagine/login.php"><img src="immagini/login3.png" alt=""></a>
                </div>
                <img src="immagini/logo.png" alt="Logo">
            </div>
        </header>
        EOD;
    }elseif(basename($_SERVER['PHP_SELF']) == 'login.php'){
        echo <<< EOD
        <header class="w-100">
            <div class="header__logo1">
                <img src="../immagini/logo.png" alt="Logo">
            </div>
            <nav>
                <div class="header__tenda">
                    <a href="registrazione.php" class="header__tenda__li">Registrati</a>
                </div>
                
            </nav>
            <div class="header__logo2">
                <img src="../immagini/logo.png" alt="Logo">
            </div>
        </header>
        EOD;
    }elseif(basename($_SERVER['PHP_SELF']) == 'giocatori.php'){
        echo <<< EOD
        <header class="w-100">
            <div class="header__logo1">
                <img src="../immagini/logo.png" alt="Logo">
                <div class='header__logo2__aggiungiti'>
                    <a href="aggiungiti.php"><img src="../immagini/aggiungiti.png" alt=""></a>
                </div>
            </div>
            <nav>
                <div class="header__tenda">
                    <a href="../index.php" class="header__tenda__li">Home</a>
                </div>
                <div class="header__tenda">
                    <a href="giocatori.php" class="header__tenda__li">Vincitori</a>
                </div>
                <div class="header__tenda">
                    <a href="storia.php" class="header__tenda__li">Storia</a>
                </div>
                
            </nav>
            <div class="header__logo2">
                <div class = "header__logo2__cerca">
                    <a href="cerca.php"><img src="../immagini/cerca.png" alt=""></a>
                </div>
            <div class = "header__logo2__login">
                <a href="login.php"><img src="../immagini/login3.png" alt=""></a>
            </div>
                <img src="../immagini/logo.png" alt="Logo">
            </div>
        </header>
        EOD;
    }
    else{
        echo <<< EOD
        <header class="w-100">
            <div class="header__logo1">
                <img src="../immagini/logo.png" alt="Logo">
            </div>
            <nav>
                <div class="header__tenda">
                    <a href="../index.php" class="header__tenda__li">Home</a>
                </div>
                <div class="header__tenda">
                    <a href="giocatori.php" class="header__tenda__li">Vincitori</a>
                </div>
                <div class="header__tenda">
                    <a href="storia.php" class="header__tenda__li">Storia</a>
                </div>
                
            </nav>
            <div class="header__logo2">
                <div class = "header__logo2__cerca">
                    <a href="cerca.php"><img src="../immagini/cerca.png" alt=""></a>
                </div>
                <div class = "header__logo2__login">
                    <a href="login.php"><img src="../immagini/login3.png" alt=""></a>
                </div>
                <img src="../immagini/logo.png" alt="Logo">
            </div>
        </header>
        EOD;
    }
?>