<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>
<body>
    <h1>Detalle de usuario <?= $user->id ?></h1>
    <ul>
        <li>
            Nombre: <?= $user->name ?>
        </li>
        <li>
            Apellido: <?= $user->surname ?>
        </li>
        <li>
            Email: <?= $user->email ?>
        </li>
        <li>
            F. Nacimiento: <?= $user->birthdate ?>
        </li>
    </ul>
</body>
</html>