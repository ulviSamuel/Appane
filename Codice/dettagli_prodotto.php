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

            <button onclick="window.location.href = 'menu_settimana.php'">Indietro</button>
        
            <?php
                require_once("variabili_connessione.php");
                $idProdotto = $_GET['idProdotto'];
                $sql        = "SELECT foto, nome, descrizione, prezzo, categoria FROM tprodotti tp JOIN tcategorie tc ON tp.idCategoria = tc.id WHERE tp.id = $idProdotto";
                $res = mysqli_query($con, $sql);
                echo "<div id='prodotto'>";
                $row = mysqli_fetch_assoc($res);
                echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                echo "<p class='descrizione_prodotto'>".$row['descrizione']."</p>";
                echo "<span class='categoria_prodotto'>Categoria: ".$row['categoria']."</span>";
                echo "<span class='prezzo_prodotto'>Prezzo: ".$row['prezzo']."€</span>";
                echo "</div>";
            ?>
        </div>
    </body>
</html>