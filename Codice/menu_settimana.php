<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <header>
            <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
            <h2 id="nome_software">Appane</h2>
            <a id="link_home" href="index.html">Home</a>
            <a id="link_carrello" href="carrello.php">
                <button id="btn_carrello">Carrello</button>
            </a>
        </header>

        <div id="corpo">
            <h1 id="titolo">Menù della Settimana</h1>

            <?php
                require_once("variabili_connessione.php");
                $sql = "SELECT foto, nome, descrizione, prezzo, categoria FROM tprodotti tp JOIN tcategorie tc ON tp.idCategoria = tc.id ORDER BY tc.categoria, tp.nome";
                $res = mysqli_query($con, $sql);
                echo "<div id='prodotti'>";
                while($row = mysqli_fetch_assoc($res))
                {
                    echo "<div class='prodotto'>";
                    echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                    echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                    echo "<p class='descrizione_prodotto'>".$row['descrizione']."</p>";
                    echo "<span class='categoria_prodotto'>Categoria: ".$row['categoria']."</span>";
                    echo "<span class='prezzo_prodotto'>Prezzo: ".$row['prezzo']."€</span>";
                    echo "<span class='testo_quantità'>Quantità:</span>";
                    echo "<input class='selettore_quantità' type='number' value='1' min='1' max='99' step='1'/>";
                    echo "<button class='btn_aggiungi_carrello'>Aggiungi al carrello</button>";
                    echo "</div>";
                }
<<<<<<< Updated upstream
                else
                    echo "<h2 id='menu_vuoto'>Non è presente ancora nessun prodotto nel menù di questa settimana</h2>"
=======
<<<<<<< HEAD
                echo "</div>";
=======
                else
                    echo "<h2 id='menu_vuoto'>Non è presente ancora nessun prodotto nel menù di questa settimana</h2>"
>>>>>>> d0dc950991f40dd846c0bf99d26d91028a5b6848
>>>>>>> Stashed changes
            ?>
        </div>
    </body>
</html>