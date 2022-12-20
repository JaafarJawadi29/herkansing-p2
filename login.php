<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Inloggen</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <img class="logo-login" src="img/Image4.png" alt="Logo van ServiceIT">

    <h1>Inloggen</h1>
    <form  class="login" action="history.php" method="post">
        <div class="login-field">
            <input type="text" placeholder="Gebruikersnaam" name="uname" required>
            <input type="password" placeholder="Wachtwoord" name="psw" required>
            <a class="psw" href="#">Wachtwoord vergeten?</a>
            <button class="button-1 login" type="submit">Inloggen</button>
    </form>

    
</body>

</html>