<?php include 'loginCheck.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service-IT</title>
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
</head>

<body>
    <?php include './assets/header2.php'; ?>
    <div class="content">
        <h1>Vraag hardware reparatie aan</h1>
        <div class="hardware">
            <form action="hw-service.php" method="post">
                <select name="hardware" id="hardware-options">
                    <option value="laptop">Laptop</option>
                    <option value="desktop">Desktop</option>
                    <option value="printer">Printer</option>
                    <option value="router">Router</option>
                    <option value="switch">Switch</option>
                    <option value="server">Server</option>
                    <option value="mobile">Mobiele telefoon</option>
                </select>
                <input type="text" name="onderwerp" id="onderwerp" placeholder="Onderwerp">
                <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" name="submit" class="button4" value="submit">
            </form>
        </div>
    </div>

</body>

</html>
<div class="center">
    <?php
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'serviceit');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Assigning POST values to variables.
        $onderwerp = $_POST['onderwerp'];
        $problem = $_POST['problem'];
        $hardware = $_POST['hardware'];
        // prepare SQL statement
        $stmt = mysqli_prepare($db, "INSERT INTO test (onderwerp, problem, hardware) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $onderwerp, $problem, $hardware);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        echo "Hardware reparatie aangevraagd";
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        header("Location: redirect.php");
        exit();
    }
    ?>
</div>