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

//Get id from user
$queryUserData = "SELECT user_id FROM user WHERE user_id = ?"; //Query to get customer email, ? = customer_id
$stmt = mysqli_prepare($conn, $queryUserData); //Prepare query
mysqli_stmt_bind_param($stmt, 'i', $user_id); //Bind $user_id to ? as int
mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

//Bind results from database
$user_id = mysqli_stmt_bind_result($stmt, $user_id);
mysqli_stmt_close($stmt); //Closes stmt

//Get contract from service id from user id
$queryServiceData = "SELECT * FROM service WHERE service_id = ?"; //Query to get contract from service id, ? = service_id
$stmt = mysqli_prepare($conn, $queryServiceData); //Prepare query
mysqli_stmt_bind_param($stmt, 'i', $service_id); //Bind $service_id to ? as int
mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

//Get contract from service id

//Bind results from database
$service_id = mysqli_stmt_bind_result($stmt, $service_id, $user_id, $employee_id, $service_type, $subject, $description, $date, $status, $contract);
// $stmt = mysqli_prepare($conn, $query)
// or die(mysqli_error($conn));

// mysqli_stmt_execute($stmt)
// or die("Could not execute query"); 

// mysqli_stmt_bind_result($stmt, $service_id, $customer_email, $employee_email, $type, $description, $hardware_description, $date, $status, $contract);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Contract</title>
</head>

<body>
    <h1>Contract</h1>
    <?php
    //Get contract from selected service id
    while (mysqli_stmt_fetch($stmt)) {
        if ($status == "closed") {
            $filename = "contract/" . $contract . ".pdf";
    ?>
            <div class="contractinfo">
                <a class="button-4" href="<?php echo $filename; ?>" target="_blank">Download</a>
            </div>
            <div class="contract">
                <iframe src="<?php echo $filename; ?>" width="100%" height="100%">
                </iframe>
        <?php
        }
    }
        ?>
            </div>
</body>

</html>