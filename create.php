<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
    <title>Maak een account aan</title>
</head>

<body>
    <?php include 'assets/header.php'; ?>
    <div class="container">
        <img class="logo-create" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">

        <h1>Maak een account aan</h1>

        <form class="login" action="action_page.php" method="post">
            <div class="input-container">
                <input type="text" placeholder="Voornaam" name="firstname" required>
                <input type="text" placeholder="Achternaam" name="lastname" required>
                <input type="email" placeholder="naam@example.com" name="username" required>
                <p class="psw-create">Dit wordt je nieuwe gebruikersnaam.</p>
                <input type="password" placeholder="Wachtwoord" name="psw" required>
                <input type="password" placeholder="Bevestig wachtwoord" name="psw" required>
                <button type="submit" class="button-1 create-account">Maak account aan</button>
        </form>
    </div>

</body>

</html>