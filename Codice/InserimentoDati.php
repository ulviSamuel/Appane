<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- questa pagina serve per inserire tramite query i dati inseriti nella pagina registrati -->
    <!-- Nome   Cognome   indirizzo di consegna  Citta   provincia   numero di telefono   email   username  -->

    <?php

        require_once('variabili_connessione.php');


        $nome      = $_POST['nome'];
        $cognome   = $_POST['cognome'];
        $indirizzo = $_POST['indirizzo'];
        $citta     = $_POST['citta'];
        $provincia = $_POST['provincia'];
        $telefono  = $_POST['telefono'];
        $email     = $_POST['email'];
        $username  = $_POST['username'];

        $sql = "";
        $rec = mysqli_query($con, $sql);


    ?>

</body>
</html>