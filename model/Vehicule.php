<?php

class Vehicule
{

    private int $_id_vehicule;
    private string $_brand;
    private string $_type;
    private string $_colour;
    private string $_licencePlate;

    // Constructeur
    public function __construct(array $data)
    {
        $this->_id_vehicule = $data["id_vehicule"];
        $this->setBrand($data["brand"]);
        $this->setType($data["type"]);
        $this->setColour($data["colour"]);
        $this->setLicencePlate($data["licencePlate"]);
    }

    // Getters
    public function getIdVehicule()
    {
        return $this->_id_vehicule;
    }

    public function getBrand()
    {
        return $this->_brand;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function getColour()
    {
        return $this->_colour;
    }

    public function getLicencePlate()
    {
        return $this->_licencePlate;
    }

    // Setters
    public function setBrand(string $brand)
    {
        if ($brand != "") {
            $this->_brand = htmlspecialchars($brand);
        } else {
            throw new Exception("Veuillez renseigner la marque du véhicule");
        }
    }

    public function setType(string $type)
    {
        if ($type != "") {
            $this->_type = htmlspecialchars($type);
        } else {
            throw new Exception("Veuillez renseigner le type du véhicule");
        }
    }

    public function setColour(string $colour)
    {
        if ($colour != "") {
            $this->_colour = htmlspecialchars($colour);
        } else {
            throw new Exception("Veuillez renseigner la couleur du véhicule");
        }
    }

    public function setLicencePlate(string $licencePlate)
    {
        if ($licencePlate != "") {
            $this->_licencePlate = htmlspecialchars($licencePlate);
        } else {
            throw new Exception("Veuillez renseigner l'immatriculation du véhicule");
        }
    }
}
