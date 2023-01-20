<?php include 'logincheckemp.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service employee</title>
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
    <?php include "assets/header2.php" ?>
</head>
<body>
    <?php
    require("database/API.php");
    $service = getService($_GET["id"]);
    $user = getUser($service[0]["user_id"]);
    if(count($service) == 0){
        header("Location: employee_overview.php");
        exit();
    }

    if(isset($_POST["submit"])){
        $query = "UPDATE `service` SET `status` = ?, employee_id = ? WHERE `service_id` = ?";
        $conn = connect();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $_POST["status"], PDO::PARAM_STR);
        switch($_POST["status"]){
            case "open":
                $stmt->bindValue(2, null, PDO::PARAM_NULL);
                break;
            case "in progress":
                $stmt->bindParam(2, $_SESSION["employee_id"], PDO::PARAM_INT);
                break;
            case "closed":
                $stmt->bindValue(2, null, PDO::PARAM_NULL);   
                break;
            }
            $stmt->bindParam(3, $_GET["id"], PDO::PARAM_INT);
            $stmt->execute();
            $service = getService($_GET["id"]);
    }
    ?>
    <div class="content">
        <div class="titleBox">
            <h1><?=$service[0]["service_type"]?></h1>
        </div>
        <div class="statusBox">
            <form method="post">
                <select name="status" id="status">
                    <option value="open"<?php if($service[0]["status"] == "open"){echo "selected='selected'";}?>>Open</option>
                    <option value="closed"<?php if($service[0]["status"] == "closed"){echo "selected='selected'";}?>>Closed</option>
                    <option value="in progress"<?php if($service[0]["status"] == "in progress"){echo "selected='selected'";}?>>In Progress</option>
                </select>
                <input type="submit" name="submit" id="submit" value="opslaan">
                <?='<a class="button3" href="contract.php?id=' . $service[0]["service_id"] .'" target="_blank">Download</a>'?>
        </div>
    </div>
    <div class="servicesEmployee">
    <div class="requests">
            <?php
                if($service[0]["employee_id"] == NULL){
                    $employeeEmail = "geen medewerker";
                }else{
                    $employee = getEmployee($service[0]["employee_id"]);
                    $employeeEmail = $employee[0]["email"];
                }
            ?>
            <h2>Medewerker:</h2>
            <?='<input type="text" value="' . $employeeEmail . '" name="employeeMail" id="employeeMail"'?>
            </form>
        </div>
        <div class="requests">
        <h2>Klant:</h2>
            <h3><?=$user[0]["email"]?></h3>
        </div>
        <div class="requests">
        <h2>Onderwerp:</h2>
            <h3><?=$service[0]["subject"]?></h3>
        </div>
        <div class="requests">
        <h2>Beschrijving:</h2>
            <h3><?=$service[0]["description"]?></h3>
        </div>
        
</div>
</body>
</html>