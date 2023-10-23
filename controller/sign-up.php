
<?php

require_once '../model/pdo-users.php';
require_once '../controller/session.php';
require_once '../controller/input-common.php';

$errors = [];

session_start();
$userId = getSessionUserId();

if ($userId != 0) {
    redirectHome();
    return;
}

if(isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $nickname = sanitizeString($_POST['nickname']);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    signup($email, $nickname, $password1, $password2);
}

require_once '../view/sign-up.view.php';

// Funcions

/**
 * Crida a fer totes les comprovacions dels inputs de l'usuari i,
 * en cas de no haver-hi errors, registra a l'usuari
 *
 * @param string $email email de l'usuari
 * @param string $nickname nickname de l'usuari
 * @param string $password1 contrasenya de l'usuari
 * @param string $password2 confirmació de contrasenya
 */
function signup($email, $nickname, $password1, $password2) {
    global $errors;

    checkEmail($email, true);
    checkNickname($nickname);
    checkPasswords($password1, $password2);

    if (!empty($errors)) return;

    // ex11
    // Encriptar password amb SHA512 
    $passEnriptada = password_hash($password1, PASSWORD_DEFAULT);
    insertNewUser($email, $nickname, $passEnriptada);
    startSession($email, true);
    redirectHome();
}

/**
 * Comprova un nickname i si hi ha errors, els afegeix a l'array global d'errors
 *
 * @param string $nickname nickname a comprovar
 */
function checkNickname($nickname) {
    global $errors;
    // Regex pel nickname:
    // no _ o . al principi
    // no __ or _. or ._ or .. a l'interior
    // caràcters permesos: a-z, A-Z, 0-9, . or _
    // no _ o . al final
    define('NICKNAME_REGEX', "/^(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/");

    if (empty($nickname)) $errors['nickname'] = "Username can't be empty.";
    else if (strlen($nickname) < 8 || strlen($nickname) > 20) $errors['nickname'] = "Username must be 8-20 characters long.";
    else if (!preg_match(NICKNAME_REGEX, $nickname)) $errors['nickname'] = "Wrong username format.";
    else if (userExistsByNickname($nickname)) $errors['nickname'] = "Username already exists.";
}