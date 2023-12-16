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

            $redirectURL = "menu_settimana.php";
            $delay = 1;     //delay di 1 secondo

            header("Refresh:$delay;url=$redirectURL");
            exit();
        }else{

            $redirectURL = "login.php";
            $delay = 1;     //delay di 1 secondo

            header("Refresh:$delay;url=$redirectURL");
            exit();

        }

    ?>

</body>
</html>