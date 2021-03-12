<?php

require("Driver.php");
require("Vehicule.php");

// Appel de la db
function dbConnect()
{
    $db = new PDO("mysql:host=localhost;dbname=vtc;charset=utf8", "root", "root");
    return $db;
}

/* ------------------------------ Page Conducteurs --------------------------------- */

// Créer le tableau pour afficher les conducteurs
function getDrivers()
{
    $db = dbConnect();


    $db = dbConnect();
    $reply = $db->query('SELECT * FROM driver');
    $drivers = array();

    while ($row = $reply->fetch()) {
        $drivers[] = new Driver($row);
    }

    return $drivers;
}

// Ajouter un conducteur
function addDriver(Driver $driver)
{
    $db = dbConnect();

    $sql = "INSERT INTO driver(firstName, lastName)";
    $sql .= "VALUES(:firstName, :lastName)";

    $reply = $db->prepare($sql);

    if ($reply->execute(array(
        "firstName" => $driver->getFirstName(),
        "lastName" => $driver->getLastName()
    ))) {
        throw new Exception("Une erreur s'est produite durant l'ajout du nouveau conducteur");
    }
}

/* ------------------------------ Page Véhicules --------------------------------- */

// Créer le tableau pour afficher les véhicules
function getVehicules()
{
    $db = dbConnect();


    $db = dbConnect();
    $reply = $db->query('SELECT * FROM vehicule');
    $vehicules = array();

    while ($row = $reply->fetch()) {
        $vehicules[] = new Vehicule($row);
    }

    return $vehicules;
}

// Ajouter un véhicule
function addVehicule(Vehicule $vehicule)
{
    $db = dbConnect();

    $sql = "INSERT INTO vehicule(brand, type, colour, licencePlate)";
    $sql .= "VALUES(:brand, :type, :colour, :licencePlate)";

    $reply = $db->prepare($sql);

    if (!$reply->execute(array(
        "brand" => $vehicule->getBrand(),
        "type" => $vehicule->getType(),
        "colour" => $vehicule->getColour(),
        "licencePlate" => $vehicule->getLicencePlate()
    ))) {
        throw new Exception("Une erreur s'est produite durant l'ajout du nouveau véhicule");
    }
}

function modifyVehicule(Vehicule $vehicule)
{
    $db = dbConnect();

    if (checkModify($vehicule)) {

        $sql = "UPDATE vehicule SET brand = :newBrand, type = :newType, colour = :newColour, licencePlate = :newLicencePlate";
        $sql .= "WHERE id_vehicule = :id_vehicule";

        $prepare = $db->prepare($sql);
        $update = $prepare->execute(array(
            "id_vehicule" => $vehicule->getIdvehicule(),
            "brand" => $vehicule->getBrand(),
            "type" => $vehicule->getType(),
            "colour" => $vehicule->getColour(),
            "licencePlate" => $vehicule->getLicencePlate()
        ));
    } else {
        throw new Exception("Le véhicule n'existe pas");
    }
    return $update;
}

function checkModify(Vehicule $vehicule)
{
    $db = dbConnect();

    $sql = "SELECT COUNT(*) AS n FROM vehicule WHERE id_vehicule = :id_vehicule";
    $reply = $db->prepare($sql);
    $reply->execute(array(
        "id_vehicule" => $vehicule->getIdVehicule()
    ));
}
