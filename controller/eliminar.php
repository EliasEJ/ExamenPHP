<!-- ex6 -->
<?php
require ("../view/eliminar.view.php");
require_once("../model/pdo-users.php");
require_once 'session.php';;

function enviar(){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
    $email = $_POST["email"];
    echo $email;
    $userId = getSessionUserId();
    baixa($userId, $email);
    }
}
}
?>  