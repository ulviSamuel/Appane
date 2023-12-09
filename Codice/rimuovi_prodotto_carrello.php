<?php
    require_once("variabili_connessione.php");
    $idProdotto = $_REQUEST['idProdotto'];
    $sql = "DELETE FROM tcarrello WHERE id = $idProdotto";
    mysqli_query($con, $sql);
?>