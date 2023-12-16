<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $username = $_POST['username'];
        $password = $_POST['password'];

        require_once('variabili_connessione.php');
        $sql = "SELECT id, username FROM tutenti WHERE username = '$username' AND password = '$password'";
        $rec = mysqli_query($con, $sql);
        if(mysqli_num_rows($rec) == 1){
            session_start();

            $row = mysqli_fetch_assoc($rec);

            $_SESSION['username'] = $row['username'];

            $_SESSION['idUtente'] = $row['id'];

            $dataOraAttuale    = new DateTime();
            $dataOraUnGiornoFa = clone $dataOraAttuale;
            $dataOraUnGiornoFa->modify("-1 day");
            $dataOraUnGiornoFaSQL = $dataOraUnGiornoFa->format('Y-m-d H:i:s');
            $sql = "SELECT tc.id AS idCarrello, tp.id AS idProdotto, quantita FROM tcarrello tc JOIN tprodotti tp ON tc.idprodotto = tp.id WHERE tc.sessione = '".session_id()."' AND tc.evaso != 's' AND datains > '$dataOraUnGiornoFaSQL'";
            $res = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) != 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    echo "<br>RowPrincipe:<br>";
                    print_r($row);
                    echo "<br>";
                    $sql2 = "SELECT id, quantita FROM tcarrello WHERE idprodotto = ".$row['idProdotto']." AND idutente = ".$_SESSION['idUtente']." AND evaso = 'n' AND datains > '$dataOraUnGiornoFaSQL'";
                    $res2 = mysqli_query($con, $sql2);
                    if(mysqli_num_rows($res2) == 0)
                    {
                        echo "<br>Update<br>";
                        $sql3 = "UPDATE tcarrello SET idutente = ".$_SESSION['idUtente']." WHERE id = ".$row['idCarrello'];
                        mysqli_query($con, $sql3);
                    }
                    else
                    {
                        $row2            = mysqli_fetch_assoc($res2);
                        echo "<br>Delete e aumenta quantità<br>";
                        echo "<br>Row2:<br>";
                        print_r($row2);
                        echo "<br>";
                        $quantità        = $row['quantita'];
                        $idProdEsistente = $row2['id'];
                        $vecchiaQuantita = $row2['quantita'];
                        $sql4            = "UPDATE tcarrello SET quantita = ".($vecchiaQuantita + $quantità)." WHERE id=$idProdEsistente";
                        mysqli_query($con, $sql4);
                        $sql5 = "DELETE FROM tcarrello WHERE sessione = '".session_id()."' AND idutente = 0";
                        mysqli_query($con, $sql5);
                    }
                }
            }

            $redirectURL = "menu_settimana.php";

            header("Location: $redirectURL");
            exit();
        }else{

            $redirectURL = "login.php";

            header("Location: ".$redirectURL."?error=true");
            exit();

        }

    ?>

</body>
</html>