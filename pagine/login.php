<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<body>
    <?php
        require("header.php");
    ?>
    <?php
        session_start();
        if(!isset($_SESSION['username'])){
            echo <<< EOD
            <div class="page_container">
        <div class="separatore"></div>
        <div style = "height: 30px;"></div>
		<h1 class="titolo_storia">Pagina di Login</h1>

        <form action="" method="post" style="margin-top: 40px;">
            <table class="tab_input">
                <tr>
                    <td><label for="username">Username: </label></td>
                    <td><input type="text" name="username" id="username" value = "<?php echo $username ?>" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <div style = "display: flex; justify-content: center; margin-top: 40px;">
                <input type="submit" value="Accedi">
            </div>
            
        </form>
        <?php
            if (isset($_POST["username"]) and isset($_POST["password"])) {
                require("../db/connessionedb.php");

                $myquery = "SELECT username, password 
                            FROM users
                            WHERE username='$username'
                                AND password='$password'";

                $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

                if ($ris->num_rows == 0) {
                    echo "<p style='text-align: center; font-size: 30px;'>Utente o password non trovati.</p>";
                    $conn->close();
                } else {
                    session_start();
                    $_SESSION["username"] = $username;

                    $conn->close();
					header("location: pagine/home.php");
                }
            }
        ?>
    </div>
    <div class="separatore"></div>
    <div class="separatore"></div>
    EOD;
        }
        else{
            echo <<<EOD
            <a href="logout.php"><h1 class="titolo_storia">LOGOUT</h1></a>
            EOD;
        }
    ?>
    
    
</body>
<?php 
        require('footer.php');
    ?>	
</html>

