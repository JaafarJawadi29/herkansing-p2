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


function getAllServices(){
    $conn = connect();
    // $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `service`");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getOpenServices(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `service` WHERE `status` = 'open'");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getClosedServices(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `service` WHERE `status` = 'closed'");
    $stmt->execute();
    return $stmt->fetchAll();
}
?>