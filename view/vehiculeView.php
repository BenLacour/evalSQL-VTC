<?php

$title = "Page Véhicules";

ob_start();

?>

<!-- Tableau pour afficher les véhicules -->

<!-- Entête de tableau -->
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">Id vehicule</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Couleur</th>
            <th scope="col">Immatriculation</th>
            <th scope="col">Modification</th>
            <th scope="col">Suppression</th>
        </tr>
    </thead>

    <!-- Contenu du tableau -->
    <tbody>
        <?php
        foreach ($vehicule as $key => $car) { ?>
            <tr>
                <th scope="row"> <?= $car->getIdVehicule() ?> </th>
                <td> <?= $car->getBrand() ?></td>
                <td> <?= $car->getType() ?></td>
                <td> <?= $car->getColour() ?></td>
                <td> <?= $car->getLicencePlate() ?></td>
                <td><a class="btn btn-warning" href="index.php?action=displayModify&amp;id=<?= $car->getIdVehicule() ?>">Modifier</a></td>
                <td><a class="btn btn-danger" href="">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Formulaire pour ajouter un nouveau véhicule -->

<h2>Ajouter un nouveau véhicule :</h2>
<div class="container">
    <form action="index.php?action=vehicule" method="post">
        <div class="mb-3">
            <label for="brand" class="form-label">Marque :</label>
            <input type="text" class="form-control" id="brand" name="brand">

            <label for="type" class="form-label">Modèle :</label>
            <input type="text" class="form-control" id="type" name="type">

            <label for="colour" class="form-label">Couleur :</label>
            <input type="text" class="form-control" id="colour" name="colour">

            <label for="licencePlate" class="form-label">Immatriculation :</label>
            <input type="text" class="form-control" id="licencePlate" name="licencePlate">

            <button class="btn btn-success" type="submit">Ajouter ce véhicule</button>

        </div>
    </form>
</div>

<?php

$content = ob_get_clean();

require("view/template.php");
?>