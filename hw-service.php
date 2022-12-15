<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service-IT</title>
    <link rel="stylesheet" href="css/stylesheet2.css">
</head>

<body>
    <?php include './assets/header.php'; ?>
    <div class="content">
        <h1>Vraag hardware reparatie aan</h1>
        <div class="hardware">
            <form action="hw-service.php" method="post">
                <select name="hardware" id="hardware-options">
                    <option value="laptop">Laptop</option>
                    <option value="desktop">Desktop</option>
                    <option value="printer">Printer</option>
                    <option value="router">Router</option>
                    <option value="switch">Switch</option>
                    <option value="server">Server</option>
                    <option value="mobile">Mobiele telefoon</option>
                </select>
                <input type="text" name="onderwerp" id="onderwerp" placeholder="Onderwerp">
                <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Zet hier uw text neer"></textarea>
                <input type="submit" class="button4" value="Aanvragen">
            </form>
        </div>
    </div>

</body>

</html>