<?php
$title = 'Modifier le véhicule';

ob_start();
?>

<div class="container">
    <h1>Véhicule <?= $car->getIdVehicule() ?></h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Caractérstiques du véhicule :</h5>
            <form action="index.php?action=displayModify&amp;id=<?= $car->getIdVehicule() ?>" method="post">
                <input type="text" value="<?= $car->getBrand() ?>" placeholder="Changez le texte de votre tâche" name="newBrand" class="form-control">
                <input type="text" value="<?= $car->getType() ?>" placeholder="Changez le texte de votre tâche" name="newType" class="form-control">
                <input type="text" value="<?= $car->getColour() ?>" placeholder="Changez le texte de votre tâche" name="newColour" class="form-control">
                <input type="text" value="<?= $car->getLicencePlate() ?>" placeholder="Changez le texte de votre tâche" name="newLicencePlate" class="form-control">
                <div class="mt-2">
                    <button type="submit" class="btn btn-dark">Modifier</button>
                </div>
            </form>
            <a class="btn btn-primary" href="index.php?action=vehicule">Retour à la liste</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

require('view/template.php');
?>