<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Maak een account aan</title>
    <?php require __DIR__ . "/assets/header.php"; ?>
</head>

<body>
    <div class="container">
        <img class="logo-create" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
        <h1>Maak een account aan</h1>

        <form action="config/process-signup.php" method="post" novalidate>
            <div class="input-container">

                <select name="user_type" id="user_type">
                    <option value="0">Kies een rol</option>
                    <option value="company">Bedrijf</option>
                    <option value="user">Gebruiker</option>
                </select>

                <input type="text" id="firstname" name="firstname" placeholder="Voornaam">
                <input type="text" id="lastname" name="lastname" placeholder="Achternaam">
                <input type="email" id="email" name="email" placeholder="naam@example.com">

                <p class="psw-create">Dit wordt je nieuwe gebruikersnaam.</p>

                <input type="password" id="password" name="password" placeholder="Wachtwoord">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Bevestig wachtwoord">

                <button type="submit" class="button-1 create-account">Maak account aan</button>
            </div>
        </form>

    </div>
</body>

</html>