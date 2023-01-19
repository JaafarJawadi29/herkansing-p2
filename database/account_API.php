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
    $stmtUser = $conn->prepare("SELECT * FROM `user` WHERE email = '" . $email . "'");
    $stmtUser->execute();
    $resultUser = $stmtUser->fetchAll();
    var_dump($resultUser);
    if(!$resultUser[0] == null){
        echo "aap";
        $query = "UPDATE `user` SET `password` = '" . $password . "' WHERE `email` = '" . $email . "'";
    }else{
        echo "beer";
        $query = "UPDATE `employee` SET `password` = '" . $password . "' WHERE `email` = '" . $email . "'";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();
}
?>