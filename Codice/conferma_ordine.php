<html>
    <head>
        <meta charset="utf-8">
        <?php
            session_start();
            if(!isset($_SESSION['idUtente']))
                header("Location: login.php");
            else
            {
                require_once("variabili_connessione.php");
                $idUtente = $_SESSION['idUtente'];
                $dataOraAttuale    = new DateTime();
                $dataOraUnGiornoFa = clone $dataOraAttuale;
                $dataOraUnGiornoFa->modify("-1 day");
                $dataOraUnGiornoFaSQL = $dataOraUnGiornoFa->format('Y-m-d H:i:s');
                $sql      = "UPDATE tcarrello SET evaso = 's' WHERE idutente = $idUtente AND evaso = 'n' AND datains > '$dataOraUnGiornoFaSQL'";
                mysqli_query($con, $sql);
            }
        ?>
    </head>

    <body>

        <img id="check_icon" src="img/check_icon.png" alt="Check Icon">
        <h1 id="titolo_conferma_ordine">Ordine avvenuto con successo</h1>
        <a id="link_home" href="index.php">
            <button id='btn_home'>Torna alla schermata home</button>
        </a>
    </body>
</html>