<!-- Header for employee -->
<header>
    <a href="index.php"><img src="assets\svg\Image2.svg"></a>
    <div class="navbar">
        <h1>Welkom Medewerker!</h1>
        <!-- <h1>Hallo <?= htmlspecialchars($user["firstname"]) ?></h1> -->
        <input type="button" class="button3" value="Log uit" onclick="window.location.href='logout.php'">
        <a href="employee_overview.php">Overzicht</a>
        <a href="account.php">Account</a>
        <a href="history.php">Geschiedenis</a>
        <a href="addEmployee.php">Medewerker toevoegen</a>
    </div>
</header>