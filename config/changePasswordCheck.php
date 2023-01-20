<?php
function checkPassword($password)
{

    if (strlen($password) < 8) {
        return false;
    }

    if (!preg_match('/[A-Z]/i', $password)) {
        return false;
    }

    if (!preg_match('/\d/', $password)) {
        return false;
    }
    return true;
}
