<?php  
$conn = require("../config/database.php");


function getAllServices(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `service`");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getOpenServices(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `service` WHERE `status` = 'open'");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getInProgressServices(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `service` WHERE `status` = 'in progress'");
    $stmt->execute();
    return $stmt->fetchAll();
}
?>