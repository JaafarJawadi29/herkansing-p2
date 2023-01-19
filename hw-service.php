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
                <select name="service_type" id="hardware-options">
                    <option value="laptop">Laptop</option>
                    <option value="desktop">Desktop</option>
                    <option value="printer">Printer</option>
                    <option value="router">Router</option>
                    <option value="switch">Switch</option>
                    <option value="server">Server</option>
                    <option value="mobile">Mobiele telefoon</option>
                </select>
                <input type="text" name="subject" id="onderwerp" placeholder="Onderwerp">
                <textarea name="description" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
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
        $employee_id = '1';
        $user_id = $_SESSION['user_id'];
        $service_type = $_POST['service_type'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $date = date("Y-m-d H:i:s");
        $status = "open";
        $contract = "string";
        // prepare SQL statement
        $stmt = mysqli_prepare($db, "INSERT INTO service (user_id, employee_id, service_type, subject, description, date, status, contract) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'iissssss', $user_id, $employee_id, $service_type, $subject, $description, $date, $status, $contract);
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