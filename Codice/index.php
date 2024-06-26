<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php session_start(); ?>
</head>
<body>
        <header>
            <div id="parte_sinistra_header">
                <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
                <h2 id="nome_software">Appane</h2>
                <a id="link_menu_settimana" href="menu_settimana.php">Menù della settimana</a>
                <a id="link_valori" href="i_nostri_valori.php">I nostri valori</a>
            </div>
            <div id="parte_destra_header">
                <a id="link_carrello" href="carrello.php">
                    <img id="img_carrello" src="img/icona_carrello.png" alt="Carrello">
                </a>
                <?php
                    if(!isset($_SESSION['idUtente']))
                    {
                        echo "<a id='link_login' href='login.php'>";
                        echo "<img id='img_login' src='img/login_icon.png' alt='Login'>";
                        echo "</a>";
                    }
                    else
                        echo "<span id='benvenuto_utente'>Benvenuto ".$_SESSION['username']."</span>";
                ?>
            </div>
        </header>
    
    
    <div class="contenuto">

        <div id="contenuto_testo">

        <h1 id="title">
            APPANE
        </h1>

        <p id="text">
            <b>
                Il nostro pane non ha sfidanti, offre prodotti di una tale qualità unica nel mercato.
            </b>
        </p>

        </div>

    </div>

    


</body>
</html>