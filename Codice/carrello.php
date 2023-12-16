<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/carrello_style.css">
    </head>

    <body>
        <header>
            <div id="parte_sinistra_header">
                <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
                <h2 id="nome_software">Appane</h2>
                <a id="link_home" href="index.php">Home</a>
                <a id="link_menu_settimana" href="menu_settimana.php">Menù della settimana</a>
                <a id="link_valori" href="i_nostri_valori.php">I nostri valori</a>
            </div>
            <div id="parte_destra_header">
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
            <h1 id="titolo">Riepilogo Ordine</h1>  

            <?php
                $idSessione = session_id();
                $idUtente   = null;
                if(isset($_SESSION['idUtente']))
                    $idUtente = $_SESSION['idUtente'];
                require_once("variabili_connessione.php");
                $dataOraAttuale    = new DateTime();
                $dataOraUnGiornoFa = clone $dataOraAttuale;
                $dataOraUnGiornoFa->modify("-1 day");
                $dataOraUnGiornoFaSQL = $dataOraUnGiornoFa->format('Y-m-d H:i:s');
                $sql = "SELECT tc.id AS idProdCarrello, tp.id AS idProdotto, foto, nome, prezzo, quantita FROM tcarrello tc JOIN tprodotti tp ON tc.idprodotto = tp.id WHERE ";
                if(!is_null($idUtente))
                    $sql = $sql."tc.idUtente = $idUtente AND tc.evaso != 's' AND datains > '$dataOraUnGiornoFaSQL' ORDER BY tc.datains";
                else
                    $sql = $sql."tc.sessione = '$idSessione' AND tc.evaso != 's' AND datains > '$dataOraUnGiornoFaSQL' ORDER BY tc.datains";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) != 0)
                {
                    $prezzoTotale = 0;
                    echo "<div id='prodotti'>";
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $prezzoProdotto = number_format(($row['prezzo']*$row['quantita']), 2, '.', '');
                        $prezzoTotale   = $prezzoTotale + $prezzoProdotto;
                        $prezzoTotale   = number_format($prezzoTotale, 2, '.', '');
                        echo "<div id='prodotto_".$row['idProdCarrello']."' class='prodotto'>";
                        echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                        echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                        echo "<span class='testo_quantità'>Quantità:".$row['quantita']."</span>";
                        echo "<span id='prezzo_totale_prodotto_".$row['idProdCarrello']."' class='prezzo_totale_prodotto'>Prezzo totale: ".$prezzoProdotto."€</span>";
                        echo "<button class='btn_dettagli_prodotto' onclick=\"window.location.href='dettagli_prodotto.php?idProdotto=".$row['idProdotto']."'\">Prodotto in dettaglio</button>";
                        echo "<button class='btn_rimuovi_carrello' onclick='rimuoviDalCarrello(".$row['idProdCarrello'].")'>Rimuovi dal carrello</button>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "<h2 id='prezzo_totale'>Totale: ".$prezzoTotale."€</h2>";
                    echo "<a id='link_conferma_ordine' href='conferma_ordine.php'>";
                    echo "<button id='btn_conferma_ordine'>Conferma Ordine</button>";
                    echo "</a>";
                }
                else
                    echo "<h2 id='carrello_vuoto'>Non ci sono prodotti nel carrello</h2>";
            ?>

            <script>
                function rimuoviDalCarrello(idProdCarrello, numProdotti)
                {
                    var conferma = confirm("Attenzione: questa operazione comporterà la rimozione irreversibile del prodotto selezionato dal carrello.");
                    if(conferma)
                    {
                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "rimuovi_prodotto_carrello.php?idProdotto=" + idProdCarrello);
                        xhttp.send();
                        var prodotto                  = document.getElementById("prodotto_" + idProdCarrello);
                        prodotto.style.display        = "none";
                        if(verificaPresenzaElementi() == false)
                        {
                            var btnConfermaOrdine           = document.getElementById("btn_conferma_ordine");
                            btnConfermaOrdine.style.display = "none";
                            var prezzoTotale                = document.getElementById("prezzo_totale");
                            prezzoTotale.style.display      = "none";
                            document.getElementById("prodotti").innerHTML = "<h2 id='carrello_vuoto'>Non ci sono prodotti nel carrello</h2>";
                        }
                        else
                        {
                            var prezzoProdottoElement     = document.getElementById("prezzo_totale_prodotto_" + idProdCarrello);
                            var prezzoProdotto            = prezzoProdottoElement.innerText.replace(/[^0-9.]/g, '');
                            var prezzoTotaleElement       = document.getElementById('prezzo_totale');
                            var prezzoTotale              = prezzoTotaleElement.innerText.replace(/[^0-9.]/g, '');
                            var prezzoAggiornato          = prezzoTotale - prezzoProdotto;
                            prezzoAggiornato              = prezzoAggiornato.toFixed(2);
                            prezzoTotaleElement.innerText = "Nuovo totale: " + prezzoAggiornato + "€";
                        }
                    }
                }

                function verificaPresenzaElementi()
                {
                    var listaProdotti = document.getElementById("prodotti");
                    for(var idx = 0; idx < listaProdotti.children.length; ++idx)
                    {
                        if(listaProdotti.children[idx].style.display != "none")
                            return true;
                    }
                    return false;
                }
            </script>
        </div>
    </body>
</html>