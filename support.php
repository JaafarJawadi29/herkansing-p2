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
            <form action="hw-service.php" method="post">
                <select name="support" id='support-options'>
                    <option value="select">Selecteer een optie</option>
                    <option value="temp">temp</option>
                    <option value="temp">temp</option>
                </select>
                <input type="text" name="onderwerp" id="onderwerp" placeholder="Onderwerp">
                <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" class="button4" value="Aanvragen">
            </form>
        </div>
    </div>

</body>

</html>