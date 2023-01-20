<?php include 'loginCheck.php'; ?>

<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'serviceit');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT service_id, subject FROM service WHERE user_id = " . $_SESSION['user_id'] . "";
$result = mysqli_query($db, $query);

// Generate options for select element
$options = "<option value='select'>Selecteer een van uw aangevraagde services</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['service_id'] . "'>" . $row['subject'] . "</option>";
}
// echo $options;  // For debugging purposes

mysqli_close($db);
?>

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
        <h1>Support</h1>
        <div class="support">
            <form action="support.php" method="post">
                <select name="service_id" id='support-options'>
                    <?php echo $options; ?>
                </select>
                <input type="text" name="subject" id="onderwerp" placeholder="Onderwerp">
                <textarea name="description" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" class="button4" value="Aanvragen" name="submit">
            </form>
        </div>
    </div>

</body>

</html>

<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'serviceit');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Assigning POST values to variables.
    $service_id = $_POST['service_id'];
    //$onderwerp = $_POST['onderwerp'];
    $description = $_POST['description'];
    $date = date("Y-m-d H:i:s");

    // prepare SQL statement
    $stmt = mysqli_prepare($db, "INSERT INTO support (service_id, description, date) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iss', $service_id, $description, $date);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($db);
    header("Location: redirect.php");
    exit();
}
