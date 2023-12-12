<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php session_start(); if(!isset($_SESSION['idUtente'])) $_SESSION['idUtente'] = 1; ?>
</head>
<body>
    <div id="intestazione">

        <div class="elemento"> <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane"> </div>
        <div class="elemento" > <h2 id="nome_software">Appane</h2> </div>
        <div class="elemento"> <a id="link_menu" href="menu_settimana.php">Menù della settimana</a> </div>
        <div class="elemento">
            <a id="link_carrello" href="carrello.php">
                <button id="btn_carrello">Carrello</button>
            </a>
        </div>
        <?php
                if(!isset($_SESSION['idUtente']))
                {
                    echo "<a id='link_login' class='elemento' href='login.php'>";
                    echo "<button id='btn_login'>Login</button>";
                    echo "</a>";
                }
            ?>
    </div>
    
    <div id="contenuto">

        <h1 id="title">
            APPANE
        </h1>
        
        <p id="text">
            <b>
                Il nostro pane non ha sfidanti, offre prodotti di una tale qualità unica nel mercato.
            </b>
        </p>
        
    </div>


</body>
</html>