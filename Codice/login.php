<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
    
    <form action="auth.php" method="post">

        <input type="text"     name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit"   value="login">
    </form>

    <p>  Non hai un account? </p>
    <a href="registrati.php"> Registrati </a>

</body>
</html>