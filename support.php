<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'serviceit');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT onderwerp FROM test";
// echo $query;  // For debugging purposes
$result = mysqli_query($db, $query);

// Generate options for select element
$options = "<option value='select'>Selecteer een van uw aangevraagde services</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['onderwerp'] . "'>" . $row['onderwerp'] . "</option>";
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
                <select name="support" id='support-options'>
                    <?php echo $options; ?>
                </select>
                <input type="text" name="onderwerp" id="onderwerp" placeholder="Onderwerp">
                <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" class="button4" value="Aanvragen" name="submit">
            </form>
        </div>
    </div>

</body>

</html>