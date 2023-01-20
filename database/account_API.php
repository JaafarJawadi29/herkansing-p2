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
    // $stmt = mysqli_prepare($conn, $queryServiceData); //Prepare query
    // mysqli_stmt_bind_param($stmt, 'i', $service_id); //Bind $service_id to ? as int
    // mysqli_stmt_execute($stmt)

    $conn = connect();
    $stmtUser = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
    $stmtUser->bindParam(1, $email, PDO::PARAM_STR);
    $stmtUser->execute();
    $resultUser = $stmtUser->fetchAll();
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
?>