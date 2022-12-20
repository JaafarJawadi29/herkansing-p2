<?php
    $conn = mysqli_connect("localhost", "root", "")
    or die("Cannot connect to server");

    mysqli_select_db($conn, "serviceit")
    or die("Could not find database<br>");
    $query = "SELECT * FROM service";

    $stmt = mysqli_prepare($conn, $query)
    or die(mysqli_error($conn));

    mysqli_stmt_execute($stmt)
    or die("Could not execute query");

    mysqli_stmt_bind_result($stmt, $service_id, $customer_email, $employee_email, $type, $description, $hardware_description, $date, $status, $contract);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php';
        while(mysqli_stmt_fetch($stmt)) {
    ?>
    <h1>Geschiedenis</h1>
    <main>
        <div class="history">
            <p><?php echo $type; ?></p>
            <p><?php echo $description; ?></p>
            <button class="button-2">Contract</button>
        </div>
    </main>
    <?php
        }
    ?>
</body>
    <?php
               mysqli_stmt_close($stmt);
               mysqli_close($conn);
    ?>
</html>