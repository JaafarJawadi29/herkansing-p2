<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- <img class="logo-login" src="img/Image4.png" alt="Logo van ServiceIT">

    <h1>Maak een account aan</h1>
    <form class="login" action="action_page.php" method="post">
        <div class="login-field">
            <input class="textfield-name" type="text" placeholder="Voornaam" name="uname" required>
            <input class="textfield-name" type="text" placeholder="Achternaam" name="uname" required>
            <input type="password" placeholder="Wachtwoord" name="psw" required>
            <input type="password" placeholder="Bevestig wachtwoord" name="psw" required>
    </form>
    <form class="login" action="action_page.php" method="post">

        </div>
        <button class="button-1 create" type="submit">Inloggen</button> -->
    <div class="container">
        <!-- <img src="img/Image4.png" alt="Logo van ServiceIT"> -->

        <h1>Maak een account aan</h1>
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Voornaam" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Achternaam" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="naam@emample.com" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Wachtwoord" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Bevestig wachtwoord" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="button-1 create">Maak account aan</button>
            </div>
        </form>

        <form class="login" action="action_page.php" method="post">
    </div>

</body>

</html>