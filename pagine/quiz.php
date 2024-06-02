<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <title>Quiz</title>
</head>
<body class = "quiz-background-222">
        <?php
            require('header.php');
        ?>
    <div class="separatore"></div>

    <div class="app">
        <h1>Quiz sul pallone d'oro</h1>
        <div class="quiz">
            <h2 id="question">La domanda va qua</h2>
            <div id="answer__button">
                <button class="btn">Risposta 1</button>
                <button class="btn">Risposta 2</button>
                <button class="btn">Risposta 3</button>
                <button class="btn">Risposta 4</button>
            </div>
            <div class="simply__flex">
                <button id="next__btn">Prossima</button>
                <button id="psdp__btn"><a href="psdp.php">Per saperne di più</a>psdp</button>
            </div>
        </div>
    </div>
        <script src="../script/script-quiz.js"></script>
</body>