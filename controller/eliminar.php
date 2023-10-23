<?php
require ("../view/eliminar.view.php");
require_once("../model/pdo-users.php");
require_once 'session.php';;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $userId = getSessionUserId();
    baixa($userId, $email);
}

?>  