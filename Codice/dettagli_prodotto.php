<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/prodotto_dettaglio_style.css">
        <title>Prodotto in Dettaglio</title>
    </head>

    <body>
        <header>
            <div id="parte_sinistra_header">
                <img id="logo" src="img/logo_provvisorio.png" alt="Logo Appane">
                <h2 id="nome_software">Appane</h2>
                <a id="link_home" href="index.php">Home</a>
                <a id="link_valori" href="i_nostri_valori.php">I nostri valori</a>
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

            <button id='btn_indietro'>Indietro</button>

            <script>
                 var btnIndietro      = document.getElementById('btn_indietro');
                 btnIndietro.addEventListener('click', btnCliccato);

                 function btnCliccato()
                 {
                    var paginaPrecedente = document.referrer;
                    window.location.href = paginaPrecedente;
                 }
            </script>
        
            <?php
                require_once("variabili_connessione.php");
                $idProdotto = $_GET['idProdotto'];
                $sql        = "SELECT foto, nome, descrizione, prezzo, categoria FROM tprodotti tp JOIN tcategorie tc ON tp.idCategoria = tc.id WHERE tp.id = $idProdotto";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) != 0)
                {
                    echo "<div id='prodotto'>";
                    $row = mysqli_fetch_assoc($res);
                    echo "<img class='foto_prodotto' src='".$row['foto']."' alt='".$row['nome']."'>";
                    echo "<h3 class='nome_prodotto'>".$row['nome']."</h3>";
                    echo "<p class='descrizione_prodotto'>".$row['descrizione']."</p>";
                    echo "<span class='categoria_prodotto'>Categoria: ".$row['categoria']."</span>";
                    echo "<span class='prezzo_prodotto'>Prezzo: ".$row['prezzo']."€</span>";
                    echo "</div>";
                }
                else
                    echo "<h2 id='prodotto_inesistente'>Prodotto non trovato</h2>"
            ?>
        </div>
    </body>
</html>