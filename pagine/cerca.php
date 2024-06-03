<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <title>Ricerca giocatori</title>
</head>
<body>
	<?php require("header.php");?>
    <div class="separatore"></div>
	<div class="page_container">
		<h1 style="text-align: center; margin-top: 0px">Ricerca giocatori</h1>
		<p>Cerca il giocatore che vuoi</p>
		<form method="post" action="">
			<table id="tab_input">
				<tr>
					<td><label for="nome">Nome:</label></td>
                    <td><input class="input_ricerca" type="text" name="nome" id="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>"></td>
				</tr>
                <tr>
					<td><label for="cognome">Cognome:</label></td>
                    <td><input class="input_ricerca" type="text" name="cognome" id="cognome" value="<?php echo isset($_POST['cognome']) ? $_POST['cognome'] : ''; ?>"></td>
				</tr>
                <tr>
					<td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" value="Cerca"/></td>
				</tr>
			</table>
		</form>

		<p></p>

		
        <?php
            require('../db/connessionedb.php');

            if (isset($_POST["nome"]) and isset($_POST["cognome"])) {
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];

                $sql = "SELECT id_giocatore, nome, cognome, banner  
                        FROM giocatori
                        WHERE nome LIKE '%$nome%'
                            AND cognome LIKE '%$cognome%'";
                //echo $_POST["titolo_da_cercare"];
                $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                if ($ris->num_rows > 0) {                
                    foreach($ris as $riga){
                        $id_giocatore = $riga["id_giocatore"];
                        $banner = $riga["banner"];
                        $nome = $riga["nome"];
                        $cognome = $riga["cognome"];

                        echo <<<EOD
                        <a href="scheda_giocatore.php?id_giocatore=$id_giocatore" class="card card--storia">
                            <img class="card__image"src="../immagini/$banner" alt="$banner">
                            <div class="card__copy">
                                <h2>$nome $cognome</h2>
                            </div>
                        </a>
                        EOD;


                    }
                        
                }
                else {
                    echo "<p>Non ho trovato nessun giocatore</p>";
                }
            }

        ?>
		

	</div>	
	<?php 
		require('footer.php')
	?>
</body>
</html>
<?php
	$conn->close();
?>