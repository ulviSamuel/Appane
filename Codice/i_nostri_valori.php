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
            <div id="grandezza_corpo">
                <div class="valore">
                    <div class = "valore_sx">
                        <h2 class="titolo_valore_sx">Qualità</h2>
                        <p id="paragrafo_valore_sx">
                            Il nostro obbiettivo è creare del pane di qualità di nicchia, non abbiamo intenzione di fare concorrenza ai supermercati.
                        </p>

                    </div>

                    <div class="foto_container_sx">
                        <div class="foto qualita"></div>
                    </div>
                    
                </div>

                <div class="valore">
                    <div class="foto_container_dx">
                        <div class="foto selezione"></div>
                    </div>
                    <div class="valore_dx">
                        <h2 class="titolo_valore_dx">Selezione degli ingredienti</h2>
                        <p id="paragrafo_valore_dx">
                            Che si tratti di olio, farine o acqua noi applichiamo una severa selezione di scelta sugli ingredienti.
                        </p>

                    </div>
                    
                </div>

                <div class="valore">
                    <div class="valore_sx">
                        <h2 class="titolo_valore_sx">Solo ingredienti km0</h2>
                        <p id="paragrafo_valore_sx">
                            Tutti gli ingredienti da noi selezionati per la creazione dei nostri prodotti vengono acquistati in territorio triestino e dintorni.
                        </p>

                    </div>

                    <div class="foto_container_sx">
                        <div class="foto chilometro_zero"></div>
                    </div>
                    
                </div>

                <div class="valore">
                    <div class="foto_container_dx">
                        <div class="foto biologico"></div>
                    </div>
                    <div class="valore_dx">
                        <h2 class="titolo_valore_dx">Solo ingredienti 100% biologici</h2>
                        <p id="paragrafo_valore_dx">
                            Gli ingredienti da noi scelti sono tutti severamente di origine biologica.
                        </p>
                    </div>
                    
                </div>

                <div class="valore">
                    <div class="valore_sx">
                        <h2 class="titolo_valore_sx">No conservanti e o additivi</h2>
                        <p id="paragrafo_valore_sx">
                            Nella selezione degli ingredienti e nella produzione del prodotto, ci impegniamo a selezionare e a non aggiungere conservanti o additivi.<br>Noi crediamo nel pane di antica tradizione, fresco e da consumare in giornata.
                        </p>
                    </div>

                    <div class="foto_container_sx">
                        <div class="foto conservanti_additivi"></div>
                    </div>
                    
                </div>

                <div class="valore">
                    <div class="foto_container_dx">
                        <div class="foto tradizione"></div>
                    </div>
                    <div class="valore_dx">
                        <h2 class="titolo_valore_dx">Tradizione</h2>
                        <p id="paragrafo_valore_dx">
                            Ci impegniamo nel continuare a produrre i nostri prodotti tramite le tecniche di produzione pre-industriali.
                        </p>
                    </div>
                    
                </div>
            </div>       
            
            
        </div>
    </body>

</html>