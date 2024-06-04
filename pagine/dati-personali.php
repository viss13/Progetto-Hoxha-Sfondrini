<?php
	$username = $_SESSION['username'];
    require('../db/connessionedb.php');

	$strmodifica = "Modifica";
	$strconferma = "Conferma";

	$modifica = false;
	if (isset($_POST["pulsante_modifica"])) {
		if($_POST["pulsante_modifica"] == $strmodifica){
			$modifica = true;
		} else {
			$modifica = false;
		}

		if ($modifica == false){
			$sql = "UPDATE users
					SET password = '".$_POST["password"]."', 
						nome = '".$_POST["nome"]."', 
						cognome = '".$_POST["cognome"]."', 
						email = '".$_POST["email"]."', 
						telefono = '".$_POST["telefono"]."', 
						comune = '".$_POST["comune"]."', 
						indirizzo = '".$_POST["indirizzo"]."' 
					WHERE username = '".$username."'";
			if($conn->query($sql) === true) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Biblioteca - Dati personali</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="contenuto">
		<h1 class="titolo_storia">Dati Personali</h1>
		<?php
			$mysql = "SELECT username, password, nome, cognome, email, telefono, comune, indirizzo 
				FROM users 
				WHERE username='$username'";
			//echo $sql;
			$ris = $conn->query($mysql) or die("<p>Query fallita!</p>");
			$row = $ris->fetch_assoc();
		?>
		<form action="" method="post">
			<table class="tab_input">
				<tr>
					<td class="td_dati_personali">Username:</td> <td><input class="input_dati_personali" type="text" name="username" value="<?php echo $row["username"]; ?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Password:</td> <td><input class="input_dati_personali" type="text" name="password" value="<?php echo $row["password"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Nome:</td> <td><input class="input_dati_personali" type="text" name="nome" value="<?php echo $row["nome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Cognome:</td> <td><input type="text" class="input_dati_personali" name="cognome" value="<?php echo $row["cognome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Email:</td> <td><input type="text" class="input_dati_personali" name="email" value="<?php echo $row["email"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Telefono:</td> <td><input type="text" class="input_dati_personali" name="telefono" value="<?php echo $row["telefono"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Comune:</td> <td><input type="text" class="input_dati_personali" name="comune" value="<?php echo $row["comune"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td class="td_dati_personali">Indirizzo:</td> <td><input type="text" class="input_dati_personali" name="indirizzo" value="<?php echo $row["indirizzo"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
                <tr>
                    <td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" name="pulsante_modifica" value="<?php if($modifica==false) echo $strmodifica; else echo $strconferma; ?>"></td>
                </tr>
			</table>
			
		</form>	
	</div>	
</body>
</html>