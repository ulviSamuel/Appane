<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <header>
            <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
            <h2 id="nome_software">Appane</h2>
            <a id="link_home" href="index.php">Home</a>
            <a id="link_carrello" href="carrello.php">
                <button id="btn_carrello">Carrello</button>
            </a>

            <?php
                session_start();
                if(!isset($_SESSION['idUtente']))
                {
                    echo "<a id='link_login' href='login.php'>";
                    echo "<button id='btn_login'>Login</button>";
                    echo "</a>";
                }
            ?>
        </header>

        <div id="corpo">
            <h1 id="titolo">Menù della Settimana</h1>

            <?php
                require_once("variabili_connessione.php");
                $sql = "SELECT tp.id, foto, nome, descrizione, prezzo, categoria FROM tprodotti tp JOIN tcategorie tc ON tp.idCategoria = tc.id ORDER BY tc.categoria, tp.nome";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) != 0)
                {
                    echo "<div id='prodotti'>";
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "<div class='prodotto'>";
                        echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                        echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                        echo "<p class='descrizione_prodotto'>".$row['descrizione']."</p>";
                        echo "<span class='categoria_prodotto'>Categoria: ".$row['categoria']."</span>";
                        $prezzoProdotto = number_format($row['prezzo'], 2, '.', '');
                        echo "<span class='prezzo_prodotto'>Prezzo: ".$prezzoProdotto."€</span>";
                        echo "<button class='btn_dettagli_prodotto' onclick=\"window.location.href='dettagli_prodotto.php?idProdotto=".$row['id']."'\">Prodotto in dettaglio</button>";
                        echo "<span class='testo_quantità'>Quantità:</span>";
                        echo "<input id='selettore_quantità_".$row['id']."' class='selettore_quantità' type='number' value='1' min='1' max='99' step='1'/>";
                        echo "<button class='btn_aggiungi_carrello' onclick='aggiungiAlCarrello(".$row['id'].")'>Aggiungi al carrello</button>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
                else
                    echo "<h2 id='menu_vuoto'>Non è presente ancora nessun prodotto nel menù di questa settimana</h2>"
            ?>
        </div>

        <script>
            function aggiungiAlCarrello(idProdotto)
            {
                var xhttp = new XMLHttpRequest();
                var quantità = document.getElementById('selettore_quantità_'+idProdotto).value;
                if(quantità >= 1 && quantità <= 99)
                {
                    xhttp.onreadystatechange = function ()
                    {
                        if(xhttp.readyState == 4 && xhttp.status == 200)
                            alert("Prodotto aggiunto al carrello");
                    }
                    xhttp.open("POST", "aggiungi_al_carrello.php?idProdotto="+idProdotto+"&quantità="+quantità);
                    xhttp.send();
                }
                else
                    alert("Quantità non accettata, inserire un numero compreso tra 1 e 99");
            }
        </script>
    </body>
</html>