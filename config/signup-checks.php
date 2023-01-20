<?php
require("../database/API.php");

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

$users = getUsers($_POST["email"]);
$employees = getEmployees($_POST["email"]);
if ($users[0] != null || $employees[0] != null) {
    die("Email already in use");
}
