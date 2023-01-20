<?php
session_start();
//Make connection with database
$conn = mysqli_connect("localhost", "root", "")
    or die("Cannot connect to server");

//Select correct database else error
mysqli_select_db($conn, "serviceit")
    or die("Could not find database<br>");

//Get data from employee
$queryEmployeeData = "SELECT * FROM employee"; //Query to get employee data
$stmt = mysqli_prepare($conn, $queryEmployeeData); //Prepare query
mysqli_stmt_execute($stmt) //Execute query
    or die("Could not execute query");

//Bind results from database
$employee_id = mysqli_stmt_bind_result($stmt, $employee_id, $first_name, $last_name, $email, $employee_type, $password);

//Check if admin is logged in
// if (!isset($_SESSION['employee_id']) && ($_SESSION['employee_type'] !== "admin")) {
//     header('location: login.php');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
    <title>Voeg een medewerker toe</title>
</head>

<body>
    <?php include 'assets/header3.php'; ?>
    <?php
    ?>
    <div class="container">
        <img class="logo-create" src="assets/svg/Image1.svg" alt="Logo van ServiceIT">
        <h1>Voeg medewerker toe</h1>

        <form action="config/process-signup-employee.php" method="post" novalidate>
            <div class="input-container">
                <input type="text" id="firstname" name="firstname" placeholder="Voornaam">
                <input type="text" id="lastname" name="lastname" placeholder="Achternaam">
                <input type="email" id="email" name="email" placeholder="naam@example.com">

                <p class="psw-create">Dit wordt je nieuwe gebruikersnaam.</p>

                <input type="password" id="password" name="password" placeholder="Wachtwoord">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Bevestig wachtwoord">

                <button type="submit" class="button-1 create-account">Maak account aan</button>
            </div>
        </form>
    </div>
</body>

</html>