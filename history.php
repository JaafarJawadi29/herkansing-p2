<?php
    //Get customer id from session login
    $id = $_SESSION['id']; 

    //Make connection with database
    $conn = mysqli_connect("localhost", "root", "")
    or die("Cannot connect to server");

    //Select correct database else error
    mysqli_select_db($conn, "serviceit")
    or die("Could not find database<br>");
    
    //Get email from customer id
    $queryCustomerData = "SELECT email FROM customer WHERE id = ?"; //Query to get customer email, ? = customer_id
    $stmt = mysqli_prepare($conn, $queryCustomerData); //Prepare for execution
    mysqli_stmt_bind_param($stmt, 'i', $id); //Bind $id to ? as int
    mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

    //Bind results from database
    $email = mysqli_stmt_bind_result($stmt, $customer_email);
    mysqli_stmt_close($stmt); //Closes stmt

    //Get all services from customer email
    $queryServiceData = "SELECT * FROM service WHERE customer_email = ?"; //Query to get all services from customer email, ? = customer_email
    $stmt = mysqli_prepare($conn, $queryServiceData); //Prepare for execution
    mysqli_stmt_bind_param($stmt, 's', $customer_email); //Bind $customer_email to ? as string
    mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

    //Bind results from database
    mysqli_stmt_bind_result($stmt, $service_id, $customer_email, $employee_email, $type, $description, $hardware_description, $date, $status, $contract);
    mysqli_stmt_close($stmt); //Closes stmt

    // $stmt = mysqli_prepare($conn, "SELECT * FROM customer WHERE email = ?")
    // or die("Could not fetch from database");
    // mysqli_stmt_bind_param($stmt, 'i', $id);
    

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
    <title>Document</title>
</head>
<body>
    <div class="histories">
    <h1>Geschiedenis</h1>
    <?php while(mysqli_stmt_fetch($stmt)) {
        if ($status == "closed") {
         ?>
    <main>
        <div class="history">
            <p class="type"><?php echo $type; ?></p>
            <p>
                <?php
                    if ($type == "hardware") {
                        echo $hardware_description;
                    } else {
                        echo $description;
                    }
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
    <?php
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    ?>
</html>