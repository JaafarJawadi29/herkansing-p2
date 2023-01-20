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

//Get user id from user
$queryUserData = "SELECT user_id FROM user WHERE user_id = ?"; //Query to get customer email, ? = customer_id
$stmt = mysqli_prepare($conn, $queryUserData); //Prepare for execution
mysqli_stmt_bind_param($stmt, 'i', $user_id); //Bind $user_id to ? as int
mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

//Bind results from database
$user_id = mysqli_stmt_bind_result($stmt, $user_id);
mysqli_stmt_close($stmt); //Closes stmt

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
</head>

<body>
    
    <div class="histories">
        <h1>Geschiedenis</h1>

        <?php
        while (mysqli_stmt_fetch($stmt)) {
            if ($status == "closed") {
        ?>
                <main>

                    <div class="history">

                        <p class="type"><?php echo $service_type; ?></p>
                        <p>
                            <?php
                            echo $subject;
                            ?>
                        </p>
                        <a href="contract.php">
                            <button class="button-2">Contract</button>
                        </a>
                    </div>
                </main>
        <?php
            }
        }
        ?>
</body>

</html>