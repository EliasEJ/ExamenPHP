<?php require "../controller/change-password.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvi contrasenya</title>
</head>
<body>
    <form action="" method="post">
        <label for="novaContra">Nova contrasenya:</label>
        <input type="password" name="password1" id="password1"><br>
        <label for="novaContra2">Torna a introduir la contrasenya:</label>
        <input type="password" name="password2" id="password2"><br>
        <button type="submit" id="boto" value="Canvi" >Canviar</button>
        <?php canviPass(); ?>
    </form>
    
</body>
</html>