<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Lien Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Lien CSS général -->
    <link rel="stylesheet" href="public/CSS/templateStyle.css">
    <title> <?= $title ?> </title>
</head>

<body>
    <!-- Navbar présente sur toutes les pages -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container-fluid">
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item mx-2">
                    <a class="nav-link" aria-current="page" href="index.php?action=driver">Conducteurs</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="index.php?action=vehicule">Véhicules</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="index.php?action=association">Association</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Variable pour intégrer le corps du template -->
    <?= $content ?>
</body>

</html>