<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Inloggen</title>
</head>

<body>
    <?php include 'assets/header.php'; ?>
    <?php include 'assets/database.php'; ?>
    <div class="container">
        <img class="logo-login" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
        <h1>Inloggen</h1>

        <form class="login" action="assets/database/" method="post">
            <div class="input-container">
                <input type="text" placeholder="Gebruikersnaam" name="username" required>
                <input type="password" placeholder="Wachtwoord" name="password" required>
                <a class="psw" href="#">Wachtwoord vergeten?</a>
                <button class="button-1 login" type="submit">Inloggen</button>
        </form>
    </div>
</body>

</html>