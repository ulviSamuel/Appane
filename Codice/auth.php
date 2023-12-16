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

            $sql = "UPDATE tcarrello SET idutente = ".$row['id']." WHERE sessione = '".session_id()."' AND idutente = 0";
            mysqli_query($con, $sql);

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