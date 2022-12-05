<?php

if isset($_POST['uname']) && isset($_POST['psw']) {
  
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$psw'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Welkom " . $row['username'];
        }
    } else {
        echo "Gebruikersnaam of wachtwoord is onjuist";
    }
}

?>