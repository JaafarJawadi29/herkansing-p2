<?php  
function connect(){
    try {
        $servername = "localhost";
        $dbname = "ServiceIT";
        $username = "root";
        $password = "";
    
        $conn = new PDO(
            "mysql:host=$servername; dbname=ServiceIT",
            $username, $password
        );
        
    $conn->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function setPasswordUser($email, $password){
    $conn = connect();
    $resultUser = getUsers($email);
    if(!$resultUser[0] == null){
        $query = "UPDATE `user` SET `password` = ? WHERE `email` = ?";
    }else{
        $query = "UPDATE `employee` SET `password` = ? WHERE `email` = ?";
    }
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $password, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->execute();
}

function getUsers($email){
    $conn = connect();
    $stmtUser = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
    $stmtUser->bindParam(1, $email, PDO::PARAM_STR);
    $stmtUser->execute();
    $resultUser = $stmtUser->fetchAll();
    return $resultUser;
}

function getEmployees($email){
    $conn = connect();
    $stmtUser = $conn->prepare("SELECT * FROM `employee` WHERE email = ?");
    $stmtUser->bindParam(1, $email, PDO::PARAM_STR);
    $stmtUser->execute();
    $resultUser = $stmtUser->fetchAll();
    return $resultUser;
}
?>