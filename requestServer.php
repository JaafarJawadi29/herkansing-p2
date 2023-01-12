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
        <h1>Vraag Server ruimte aan</h1>
        <div class="hardware">
            <form action="requestServer.php" method="post">
                <input type="text" name="onderwerp" id="onderwerp" placeholder="Onderwerp">
                <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" class="button4" value="Aanvragen" name='submit'>
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
        $hardware = 'server ruimte';
        // prepare SQL statement
        $stmt = mysqli_prepare($db, "INSERT INTO test (onderwerp, problem, hardware) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $onderwerp, $problem, $hardware);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        echo "Server ruimte aangevraagd";
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        header("Location: redirect.php");
        exit();
    }
    ?>
</div>