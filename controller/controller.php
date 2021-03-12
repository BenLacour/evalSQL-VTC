<?php

require("model/model.php");

// Affichage tableau conducteurs

function driver()
{
    // Affichage du tableau des conducteurs
    $driver = getDrivers();

    // Ajout de conducteur
    if (
        isset($_POST["firstName"]) && isset($_POST["lastName"])
        && $_POST["firstName"] != "" && $_POST["lastName"] != ""
    ) {
        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName = htmlspecialchars($_POST["lastName"]);

        $driver = new Driver(array(
            "id_driver" => 0,
            "firstName" => $firstName,
            "lastName" => $lastName
        ));

        addDriver($driver);
    }
    require("view/driverView.php");
}

function vehicule()
{
    // Affichage tableau des véhicules
    $vehicule = getVehicules();

    // Ajout de véhicule
    if (
        isset($_POST["brand"]) && isset($_POST["type"]) && isset($_POST["colour"]) && isset($_POST["licencePlate"])
        && $_POST["brand"] != "" && $_POST["type"] != "" && $_POST["colour"] != "" && $_POST["licencePlate"] != ""
    ) {
        $brand = htmlspecialchars($_POST["brand"]);
        $type = htmlspecialchars($_POST["type"]);
        $colour = htmlspecialchars($_POST["colour"]);
        $licencePlate = htmlspecialchars($_POST["licencePlate"]);

        $vehicule = new Vehicule(array(
            "id_vehicule" => 0,
            "brand" => $brand,
            "type" => $type,
            "colour" => $colour,
            "licencePlate" => $licencePlate
        ));

        addVehicule($vehicule);
    }
    require("view/vehiculeView.php");
}

function displayModify(string $brand, string $type, string $colour, string $licencePlate)
{
    // Faire apparaitre le détail d'un véhicule
    $db = dbConnect();

    if (isset($_GET['id'])) {
        $vehicule = new Vehicule(array("id" => $_GET["id"], "brand" => "empty", "type" => "empty", "colour" => "empty", "licencePlate" => "empty"));
        $vehicule = $vehicule->getIdVehicule($vehicule);
    } else {
        header('Location: index.php');
    }

    require('view/modifyView.php');
}

function updateModify(Vehicule $vehicule)
{
    $db = dbConnect();

    if (
        isset($_GET['id']) && $_GET['id_vehicule'] > 0 && isset($_POST['newBrand']) && $_POST['newBrand'] != "" && isset($_POST['newType']) && $_POST['newType'] != ""
        && isset($_POST['newColour']) && $_POST['newColour'] != "" && isset($_POST['newLicencePlate']) && $_POST['newLicencePlate'] != ""
    ) {
        $vehicule = new Vehicule(array("id_vehicule" => $_GET["id"], "brand" => $_POST["newBrand"], "type" => $_POST["newType"], "colour" => $_POST["newColour"], "licencePlate" => $_POST["newLicencePlate"]));

        if (displayModify($vehicule)) {
            header('Location:index.php?check=1');
        } else {
            header('Location:index.php?check=2');
        }
    } else {
        throw new Exception("Le texte ne peut être vide !");
    }
}
