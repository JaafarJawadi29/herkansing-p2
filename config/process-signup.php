<?php

if (empty($_POST["firstname"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Invalid email");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match('/[A-Z]/i', $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match('/\d/', $_POST["password"])) {
    die("Password must contain at least one digit");
}

if ($_POST["password"] != $_POST["password_confirmation"]) {
    die("Passwords do not match");
}

if ($_POST["user_type"] != "company" && $_POST["user_type"] != "user") {
    die("Invalid user type selected");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO user (email, first_name, last_name, password, user_type)"
    . "VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sssss",
    $_POST["email"],
    $_POST["firstname"],
    $_POST["lastname"],
    $password_hash,
    $_POST["user_type"]
);


if ($stmt->execute()) {
    echo "Account created successfully";
    header("Location: ../register-succes.php");
    exit;
} else {
    if ($mysqli->errno == 1062) {
        die("Email already exists");
    } else {
        die("SQL error: " . $mysqli->errno . " " . $mysqli->error);
    }
}
