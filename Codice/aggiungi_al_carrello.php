<?php
    session_start();
    require_once("variabili_connessione.php");
    $quantità   = $_REQUEST['quantità'];
    $idProdotto = $_REQUEST['idProdotto'];
    $sql = "SELECT id, quantita FROM tcarrello WHERE idProdotto = $idProdotto";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) == 1)
    {
        $row = mysqli_fetch_assoc($res);
        $idProdEsistente = $row['id'];
        $vecchiaQuantita = $row['quantita'];
        $sql             = "UPDATE tcarrello SET quantita = ".($vecchiaQuantita + $quantità)." WHERE id=$idProdEsistente";
        mysqli_query($con, $sql);
    }
    else
    {
        $idUtente = null;
        if(isset($_SESSION['idUtente']))
            $idUtente = $_SESSION['idUtente'];
        $idSessione = session_id();
        echo $idSessione;
        $evaso = "n";
        $dataIns = DATE("Y:m:d H:i:s");
        $sql = "INSERT INTO tcarrello (idprodotto, quantita, sessione, idutente, evaso, datains) VALUES ('$idProdotto', '$quantità', '$idSessione', '$idUtente', '$evaso', '$dataIns')";
        mysqli_query($con, $sql);
    }
?>