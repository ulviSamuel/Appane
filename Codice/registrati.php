<!DOCTYPE html>
<html lang="en">
<head>

    <script>

        function controllo(){

            var tel = document.getElementByID("telefono").value;
            var email = document.getElementByID("email").value;
            var mes = document.getElementById("alert");

            if(tel.length != 10){

                mes.innerHTML = "<div class='messaggio'>Errore errore errore<input type='button' name='chiudimi' value='chiudimi' onClick='chiudiAlert()'></div>";
			    mes.style.display = "block";
                return false;

            }

        }

        funcion chiudiAlert(){

            var mes = document.getElementById("alert");
		    mes.style.display = "none";

        }

    </script>

    <link rel="stylesheet" type="text/css" href="css/message_alert.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Nome   Cognome   indirizzo di consegna  Citta   provincia   numero di telefono   email   username  -->
    <form action="" method="POST" onSubmit="return controllo()">
        <input type="text"     name="nome" placeholder="Name">
        <input type="text"     name="cognome" placeholder="Cognome">
        <input type="text"     name="indirizzo" placeholder="inidirizzo di consegna">
        <input type="number"   name="telefono" placeholder0="+39">
        <input type="text"     name="email" placeholder="email">
        <input type="radio"    name="notifica" value="s">
        <input  type="radio"   name="notifica" value="n">
        <input type="text"     name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">

        <input type="submit"   value="registrati">

    </form>

    <div id = "alert">

    </div>


</body>
</html>