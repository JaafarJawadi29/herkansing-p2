<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['employee_id'])) {
    header('location: login.php');
    exit();
}
