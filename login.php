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

    <div class="popup">
        <div class="popup-content" id="popup">
            <h1>Wachtwoord vergeten</h1>
            <p class="popup-text">Gelieve contact opnemen met de IT beheerders om uw wachtwoord te resetten.</p>
            <button type="button" class="button-1 pswf" onclick="closePopup()">Sluiten</button>
        </div>

        <div class="container">
            <img class="logo-login" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
            <h1>Inloggen</h1>
            <form action="database/authentication.php" class="login" method="post">
                <div class="input-container">
                    <input type="text" placeholder="Gebruikersnaam" id="user" name="username" required>
                    <input type="password" placeholder="Wachtwoord" id="pass" name="password" required>
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

            // function validation() {
            //     var id = document.f1.user.value;
            //     var ps = document.f1.pass.value;
            //     if (id.length == "" && ps.length == "") {
            //         alert("User Name and Password fields are empty");
            //         return false;
            //     } else {
            //         if (id.length == "") {
            //             alert("User Name is empty");
            //             return false;
            //         }
            //         if (ps.length == "") {
            //             alert("Password field is empty");
            //             return false;
            //         }
            //     }
            // }
        </script>

</body>

</html>