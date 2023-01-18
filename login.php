<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/config/database.php";

    $sql = sprintf(
        "SELECT * FROM users
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: dashboard.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
    <title>Inloggen</title>
    <?php include __DIR__ . "/assets/header.php"; ?>
</head>

<body>
    <div class="popup">
        <div class="popup-content" id="popup">
            <h1>Wachtwoord vergeten</h1>
            <p class="popup-text">Gelieve contact opnemen met de IT beheerders om uw wachtwoord te resetten.</p>
            <button type="button" class="button-1 pswf" onclick="closePopup()">Sluiten</button>
        </div>

        <div class="container">
            <img class="logo-login" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
            <h1>Inloggen</h1>

            <form method="post">
                <div class="input-container">
                    <input type="email" id="email" name="email" placeholder="naam@example.com" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    <input type="password" id="password " name="password" placeholder="Wachtwoord">

                    <button class="btn psw" type="button" onclick="openPopup()">Wachtwoord vergeten?</button>

                    <?php if ($is_invalid) : ?>
                        <em>Emailadres of wachtwoord is onjuist. </em>
                    <?php endif; ?>

                    <button class="button-1 login">Inloggen</button>
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