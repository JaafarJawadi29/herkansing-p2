<?php include 'loginCheck.php'; ?>
<?php
//Get user id from session login
$user_id = $_SESSION['user_id'];

//Make connection with database
$conn = mysqli_connect("localhost", "root", "")
    or die("Cannot connect to server");

//Select correct database else error
mysqli_select_db($conn, "serviceit")
    or die("Could not find database<br>");

//Get all services from user id
$queryServiceData = "SELECT * FROM service WHERE user_id = ?"; //Query to get all services from customer email, ? = customer_email
$stmt = mysqli_prepare($conn, $queryServiceData); //Prepare for execution
mysqli_stmt_bind_param($stmt, 'i', $user_id); //Bind $user_id to ? as string
mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

//Bind results from database
mysqli_stmt_bind_result($stmt, $service_id, $user_id, $employee_id, $service_type, $subject, $description, $date, $status, $contract);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
    <title>Geschiedenis</title>
    <?php require __DIR__ . "/assets/header2.php"; ?>

</head>

<body>
<div class="titleBox"><h1>Geschiedenis</h1></div>
    
    <div class="histories">
    
        <?php
        while (mysqli_stmt_fetch($stmt)) {
            if ($status == "closed") {
        ?>
                <div class="content">
                    <div class="history">

                        <p><?php echo $service_type; ?></p>
                        <p>
                            <?php
                            echo $subject;
                            ?>
                        </p>
                        <?= "<a href='contract.php?id=" . $service_id . "'>" ?>
                            <button class="button4">Contract</button>
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
</body>

</html>