<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/nostri_valori_style.css">
        <title>I Nostri Valori</title>
    </head>

    <body>
        <header>
            <div id="parte_sinistra_header">
                <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
                <h2 id="nome_software">Appane</h2>
                <a id="link_home" href="index.php">Home</a>
                <a id="link_menu_settimana" href="menu_settimana.php">Menù della settimana</a>
            </div>
            <div id="parte_destra_header">
                <a id="link_carrello" href="carrello.php">
                    <img id="img_carrello" src="img/icona_carrello.png" alt="Carrello">
                </a>
                <?php
                    session_start();
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

        <div id="corpo">
            
            <h1 id="titolo">I Nostri Valori</h1>

            <div class="valore_sx">
                <h2 class="titolo_valore_sx">Qualità</h2>
                <p id="paragrafo_valore_sx">
                    Il nostro obbiettivo è creare del pane di qualità e di nicchia, la nostra intenzione non è fare concorrenza ai supermercati.
                </p>
            </div>

            <div class="valore_dx">
                <h2 class="titolo_valore_dx">Selezione degli ingredienti</h2>
                <p id="paragrafo_valore_dx">
                    Che si tratti di olio, farine o acqua noi applichiamo una severa selezione sugli ingredienti.
                </p>
            </div>

            <div class="valore_sx">
                <h2 class="titolo_valore_sx">Solo ingredienti km0</h2>
                <p id="paragrafo_valore_sx">
                    Tutti gli ingredienti da noi selezionati per la creazione dei nostri prodotti vengono acquistati in territorio triestino e nei dintorni.
                </p>
            </div>

            <div class="valore_dx">
                <h2 class="titolo_valore_dx">Solo ingredienti 100% biologici</h2>
                <p id="paragrafo_valore_dx">
                    Gli ingredienti da noi scelti sono tutti severamente di origine biologica.
                </p>
            </div>

            <div class="valore_sx">
                <h2 class="titolo_valore_sx">No conservanti e o additivi</h2>
                <p id="paragrafo_valore_sx">
                    Nella selezione degli ingredienti e nella produzione del prodotto, ci impegnamo a selezionare e a non aggiungere conservanti o additivi.<br>Noi crediamo nel pane di antica tradizione, fresco, naturale e da consumare in giornata.
                </p>
            </div>

            <div class="valore_dx">
                <h2 class="titolo_valore_dx">Tradizione</h2>
                <p id="paragrafo_valore_dx">
                    Ci impegniamo a preservare la produzione dei nostri prodotti seguendo l'antica tradizione, con un approccio artigianale.
                </p>
            </div>
        </div>
    </body>

</html>