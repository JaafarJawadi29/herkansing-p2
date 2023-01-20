<?php
session_start();
if (!isset($_SESSION['employee_id']) && !isset($_SESSION["user_id"])) {
    header('location: login.php');
    exit();
}