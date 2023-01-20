<?php include 'logincheckemp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Account Beheren</title>
    <?php include __DIR__ . "/assets/header.php"; ?>
</head>

<body>
    <?php
    require("database/account_API.php");
    $error = "";
    if(isset($_POST["submit"])){
        $password = $_POST["newPassword"];
        $passwordConfirm = $_POST["confirmPassword"];
        //$email = $_SESSION["email"];
        $email = "aap.gmail.com";

        if(!($password === $passwordConfirm)){
            echo "Wachtwoorden komen niet overeen";
        }else{
            $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            echo $passwordHash;
            setPasswordUser($email, $passwordHash);
        }
    }
    ?>
    <div class="container">
        <img class="logo-account" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
        <h1>Account Beheren</h1>

        <form method="post">
            <div class="input-container">
                <input type="password" id="newPassword" name="newPassword" placeholder="nieuw wachtwoord">
                <input type="password" id="confirmPassword " name="confirmPassword" placeholder="herhaal wachtwoord">
                <button class="button-1 login" name="submit" id="submit">Inloggen</button>
        </form>
    </div>
</body>

</html>