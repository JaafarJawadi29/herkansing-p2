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
    <div class="container">
        <img src="img/Image4.png" alt="Logo van ServiceIT">

        <h1>Maak een account aan</h1>

        <form class="login" action="action_page.php" method="post">
            <input class="input-names" type="text" placeholder="Voornaam" required="required">
            <input class="input-names" type="text" placeholder="Achternaam" required="required">
            <input class="input" type="email" placeholder="naam@emample.com" required="required">
            <p>Dit wordt je nieuwe gebruikersnaam.</p>
            <input class="input" type="password" placeholder="Wachtwoord" required="required">
            <input class="input" type="password" placeholder="Bevestig wachtwoord" required="required">
            <button type="submit" class="button-1 create-account">Maak account aan</button>
        </form>
    </div>

</body>

</html>