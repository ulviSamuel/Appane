<?php
    require_once("variabili_connessione.php");
    $idProdotto = $_REQUEST['idProdotto'];
    $quantità   = $_REQUEST['quantità'];
    $sql = "INSERT ";
    $res = mysqli_query($con, $sql);
?>