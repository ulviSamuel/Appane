<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <div class = "backgroundOpacity">

    </div>
    <button id='btn_indietro'>Indietro</button>

    <script>
        var btnIndietro      = document.getElementById('btn_indietro');
        btnIndietro.addEventListener('click', btnCliccato);

        function btnCliccato()
        {
            var paginaPrecedente = document.referrer;
            window.location.href = paginaPrecedente;
        }
    </script>
    
    <div id = "input">

        <form action="auth.php" method="post" class = "loginForm">

            <input type="text"     name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="submit"   value="login">
        </form>

        <?php
            if(isset($_GET['error']))
                echo "<span id='mess_errore'>Credenziali errate</span>";
        ?>

        <div class = "nuovoAccountDiv">
            <p id = "registrati">  Non hai un account? 
            <a href="registrati.php"> Registrati </a>
            </p>
        </div>
        

        
    </div>

    

</body>
</html>