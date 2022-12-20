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
    <div class="popup">
        <div class="popup-content" id="popup">
            <h1>Wachtwoord vergeten</h1>
            <p class="popup-text">Gelieve contact opnemen met de IT beheerders om uw wachtwoord te resetten.</p>
            <button type="button" class="button-1 pswf" onclick="closePopup()">Sluiten</button>
        </div>

        <div class="container">
            <img class="logo-login" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
            <h1>Inloggen</h1>

            <form class="login" action="" method="post">
                <div class="input-container">
                    <input type="text" placeholder="Gebruikersnaam" name="username" required>
                    <input type="password" placeholder="Wachtwoord" name="password" required>
                    <button class="btn psw" type="button" onclick="openPopup()">Wachtwoord vergeten?</button>
                    <button class="button-1 login" type="submit">Inloggen</button>
            </form>
        </div>

        <script>
            let popup = document.getElementById("popup");

            function openPopup() {
                popup.classList.add("open-popup");
            }

            function closePopup() {
                popup.classList.remove("open-popup");
            }
        </script>

</body>

</html>