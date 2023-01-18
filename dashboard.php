<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/config/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Inloggen</title>
    <?php include __DIR__ . "/assets/header.php"; ?>
</head>

<body>
    <div class="container">

        <?php if (isset($user)) : ?>
            <h1>Hallo <?= htmlspecialchars($user["firstname"]) ?></p>
                <p><a href="config/logout.php">Uitloggen</a></p>
            <?php else : ?>
                <h1><a href="login.php">Inloggen</a> of <a href="signup.html">Maak een account aan.</a></h1>
            <?php endif; ?>

    </div>
</body>

</html>