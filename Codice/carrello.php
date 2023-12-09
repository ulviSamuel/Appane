<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <header>
            <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
            <h2 id="nome_software">Appane</h2>
            <a id="link_home" href="index.html">Home</a>
            <a id="link_menu_settimana" href="menu_settimana.php">Menù della settimana</a>
        </header>

        <div id="corpo">
            <h1 id="titolo">Riepilogo Ordine</h1>  

            <?php
                session_start();
                $idSessione = session_id();
                $idUtente   = null;
                if(isset($_SESSION['idUtente']))
                    $idUtente = $_SESSION['idUtente'];
                require_once("variabili_connessione.php");
                $sql = "SELECT tc.id AS idProdCarrello, tp.id AS idProdotto, foto, nome, prezzo, quantita FROM tcarrello tc JOIN tprodotti tp ON tc.idprodotto = tp.id WHERE ";
                if(!is_null($idUtente))
                    $sql = $sql."tc.idUtente = $idUtente ORDER BY tc.datains";
                else
                    $sql = $sql."tc.sessione = '$idSessione' ORDER BY tc.datains";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) != 0)
                {
                    $prezzoTotale = 0;
                    echo "<div id='prodotti'>";
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $prezzoTotale = $prezzoTotale + ($row['prezzo']*$row['quantita']);
                        echo "<div id='prodotto_".$row['idProdCarrello']."' class='prodotto'>";
                        echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                        echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                        echo "<span class='testo_quantità'>Quantità:".$row['quantita']."</span>";
                        echo "<span class='prezzo_totale_prodotto'>Prezzo totale: ".($row['prezzo']*$row['quantita'])."€</span>";
                        echo "<button class='btn_dettagli_prodotto' onclick=\"window.location.href='dettagli_prodotto.php?idProdotto=".$row['idProdotto']."'\">Prodotto in dettaglio</button>";
                        echo "<button class='btn_rimuovi_carrello' onclick='rimuoviDalCarrello(".$row['idProdCarrello'].")'>Rimuovi dal carrello</button>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "<h2 id='prezzo_totale'>Totale: ".$prezzoTotale."€</h2>";
                }
                else
                    echo "<h2 id='carrello_vuoto'>Non ci sono prodotti nel carrello</h2>";
            ?>

            <script>
                function rimuoviDalCarrello(idProdCarrello)
                {
                    var conferma = confirm("Attenzione: questa operazione comporterà la rimozione irreversibile del prodotto selezionato dal carrello.");
                    if(conferma)
                    {
                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "rimuovi_prodotto_carrello.php?idProdotto="+idProdCarrello);
                        xhttp.send();
                        var prodotto = document.getElementById("prodotto_"+idProdCarrello);
                        prodotto.style.display = "none";
                    }
                }
            </script>

        </div>

    </body>
</html>