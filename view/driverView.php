<?php

$title = "Page Conducteurs";

ob_start();

?>

<!-- Tableau pour afficher les conducteurs -->

<!-- Entête de tableau -->
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">Id conducteur</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
        </tr>
    </thead>

    <!-- Contenu du tableau -->
    <tbody>
        <?php
        foreach ($driver as $key => $drive) { ?>
            <tr>
                <th scope="row"> <?= $drive->getIdDriver() ?> </th>
                <td> <?= $drive->getFirstName() ?></td>
                <td> <?= $drive->getLastName() ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Formulaire pour ajouter un nouveau conducteur -->

<h2>Ajouter un nouveau conducteur :</h2>
<div class="container">
    <form action="index.php?action=driver" method="post">
        <div class="mb-3">
            <label for="lastName" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="lastName" name="lastName">

            <label for="firstName" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="firstName" name="firstName">

            <button class="btn btn-success" type="submit">Ajouter ce conducteur</button>

        </div>
    </form>
</div>

<?php

$content = ob_get_clean();

require("view/template.php");

?>