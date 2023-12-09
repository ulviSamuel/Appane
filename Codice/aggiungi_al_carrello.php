<?php
    session_start();
    require_once("variabili_connessione.php");
    $idUtente = null;
    if(isset($_SESSION['idUtente']))
        $idUtente = $_SESSION['idUtente'];
    $idProdotto = $_REQUEST['idProdotto'];
    $quantità   = $_REQUEST['quantità'];
    $idSessione = session_id();
    echo $idSessione;
    $evaso = "n";
    $dataIns = DATE("Y:m:d H:i:s");
    $sql = "INSERT INTO tcarrello (idprodotto, quantita, sessione, idutente, evaso, datains) VALUES ('$idProdotto', '$quantità', '$idSessione', '$idUtente', '$evaso', '$dataIns')";
    mysqli_query($con, $sql);
?>