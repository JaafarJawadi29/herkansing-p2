<?php
    $conn = mysqli_connect("localhost", "root", "",)
    or die("Can't connect to server");

    mysqli_select_db($conn, "serviceit")
    or die("Can't connect to database");

    if(isset($_GET['code'])){
        $query = "SELECT * FROM service WHERE service_id = ?";
        $stmt = mysqli_prepare($conn, $query)
        or die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "s", $_GET['code'])
        or die("Fout");

        mysqli_stmt_execute($stmt)
        or die("Couldn't execute");

        mysqli_stmt_bind_result($stmt, $service_id, $customer_email, $employee_email, $type, $description, $hardware_description, $date, $status, $contract);

        while(mysqli_stmt_fetch($stmt)) {

        }
        if (mysqli_stmt_num_rows($stmt) == 0) {
            header("location: index.php");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("location: index.php");
    }
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
    <?php include 'header.php'; ?>
    <h1>Geschiedenis</h1>
    <main>
        <div class="history">
            <p><?php echo $type; ?></p>
            <p><?php echo $description; ?></p>
            <button class="button-2">Contract</button>
        </div>
    </main>
</body>
</html>