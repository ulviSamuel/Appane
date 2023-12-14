<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $username = $_POST['userame'];
        $password = $_POST['password'];

        require_once('variabili_connessione.php');
        $sql = "SELECT * FROM `tutenti` WHERE username = '$username' AND PASSWORD = '$password'";
        $rec = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rec) == 1){
            session_start();

            $array = mysqli_fetch_array($rec);

            $_SESSION['username'] = $username;
            $_SESSION['connessione'] = $con;

            $_SESSION['idUtente'] = $rec['id'];

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