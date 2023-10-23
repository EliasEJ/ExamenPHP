<?php require_once("../controller/eliminar.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar-se de baixa</title>
</head>
<body>
    <form action="" method="post">
        <label for="user">Email</label>
        <input type="text" name="user" id="user">
        <button type="submit">Baixa</button>
    </form>
<?php enviar()?>
</body>
</html>
