<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Services</title>
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
</head>

<body>
    <?php include 'assets/header2.php'; ?>
    <div class="content">
        <h1>Diensten</h1>
        <div class="requests">
            <div class="service">
                <p>Hardware reparatie</p>
                <input type="button" class="button4" value="Aanvragen" onclick="window.location='hw-service.php'">
            </div>
        </div>
        <div class="requests">
            <div class="service">
                <p>Server onderhoud</p>
                <input type="button" class="button4" value="Aanvragen" onclick="window.location='serverMaintenance.php'">
            </div>
        </div>
        <div class="requests">
            <div class="service">
                <p>Server ruimte aanvragen</p>
                <input type="button" class="button4" value="Aanvragen" onclick="window.location='requestServer.php'">
            </div>
        </div>
        <div class="requests">
            <div class="service">
                <p>Webdesign</p>
                <input type="button" class="button4" value="Aanvragen" onclick="window.location='requestWebdesign.php'">
            </div>
        </div>
        <div class="requests">
            <div class="service">
                <p>Webhosting</p>
                <input type="button" class="button4" value="Aanvragen" onclick="window.location='requestWebhosting.php'">
            </div>
        </div>
    </div>

</body>

</html>

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