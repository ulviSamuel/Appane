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

        session_start();

        $nome      = $_POST['nome'];
        $cognome   = $_POST['cognome'];
        $indirizzo = $_POST['indirizzo'];
        $telefono  = $_POST['telefono'];
        $email     = $_POST['email'];

        if(isset($_POST['notifica'])){
            $notifica = $_POST['notifica'];
        }else{
            $notifica = "s";
        }

        $username  = $_POST['username'];
        $password  = $_POST['password'];
        
        

        $sql = "INSERT INTO tutenti ( username, password, telefono, email, indirizzo, notifiche, cognome, nome)	
        VALUES ('$username', '$password','$telefono', '$email', '$indirizzo','$notifica', '$cognome', '$nome');";
        mysqli_query($con, $sql);

        $sql = "SELECT id, username FROM tutenti WHERE username = '$username' AND password = '$password'";
        $rec = mysqli_query($con, $sql);

        if(mysqli_num_rows($rec) == 1)
        {
            $row = mysqli_fetch_assoc($rec);
            $_SESSION['idUtente'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $dataOraAttuale    = new DateTime();
            $dataOraUnGiornoFa = clone $dataOraAttuale;
            $dataOraUnGiornoFa->modify("-1 day");
            $dataOraUnGiornoFaSQL = $dataOraUnGiornoFa->format('Y-m-d H:i:s');
            $sql = "UPDATE tcarrello SET idutente = ".$_SESSION['idUtente']." WHERE sessione = '".session_id()."' AND evaso != 's' AND datains > '$dataOraUnGiornoFaSQL'";
            mysqli_query($con, $sql);
            header('location:index.php');
        }
    ?>

</body>
</html>