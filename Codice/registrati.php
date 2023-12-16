<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="css/message_alert.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
</head>
<body>

    <!-- Nome   Cognome   indirizzo di consegna  Citta   provincia   numero di telefono   email   username  -->
    <form action="InserimentoDati.php" method="POST" >
        <input type="text"     name="nome" placeholder="Name" required>
        <input type="text"     name="cognome" placeholder="Cognome" required>
        <input type="text"     name="indirizzo" placeholder="inidirizzo di consegna" required>
        <input type="tel"      name="telefono" pattern="[0-9]{10}"  placeholder="+39" required>
        <input type="email"     name="email" placeholder="email" required>
        <input type="radio"    name="notifica" value="s" required>
        <input  type="radio"   name="notifica" value="n" required>
        <input type="text"     name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>

        <input type="submit"   value="registrati">

    </form>

    <div id = "alert">

    </div>


</body>
</html>