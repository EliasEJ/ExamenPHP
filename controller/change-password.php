<?php
require_once("../view/canviContra.php");
require_once("../model/pdo-users.php");
//ex 13

if (isset($_POST["submit"])) {
    function canviPass() {
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $id = 1;
    if ($password1 == $password2) {
        modificarPass($id, $password1);
    }
}
}


?>