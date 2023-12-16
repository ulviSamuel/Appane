<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
</head>
<body>

    <div class = "backgroundOpacity">

    </div>

    <div id = "input">

        <form action="InserimentoDati.php" method="POST" class = "loginForm">
            <input type="text"     name="nome" placeholder="Name" required>
            <input type="text"     name="cognome" placeholder="Cognome" required>
            <input type="text"     name="indirizzo" placeholder="inidirizzo di consegna" required>
            <input type="tel"      name="telefono" pattern="[0-9]{10}"  placeholder="+39" required>
            <input type="email"    name="email" placeholder="email" required>
            <div class = "newsletterCheckbox">
                <label for="checkbox" > abilita notifiche </label>
                <input type="checkbox" name="checkbox" id="checkbox" >
            </div>
            <input type="text"     name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>

            <input type="submit"   value="registrati">

        </form>

    </div>
    


</body>
</html>