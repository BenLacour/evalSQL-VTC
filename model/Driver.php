<?php

class Driver
{

    private int $_id_driver;
    private string $_firstName;
    private string $_lastName;

    // Constructeur
    public function __construct(array $data)
    {
        $this->_id_driver = $data["id_driver"];
        $this->setFirstName($data["firstName"]);
        $this->setLastName($data["lastName"]);
    }

    // Getters
    public function getIdDriver()
    {
        return $this->_id_driver;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    // Setters
    public function setFirstName(string $firstName)
    {
        if ($firstName != "") {
            $this->_firstName = htmlspecialchars($firstName);
        } else {
            throw new Exception("Veuillez renseigner le prénom du conducteur");
        }
    }

    public function setLastName(string $lastName)
    {
        if ($lastName != "") {
            $this->_lastName = htmlspecialchars($lastName);
        } else {
            throw new Exception("Veuillez renseigner le nom du conducteur");
        }
    }
}
