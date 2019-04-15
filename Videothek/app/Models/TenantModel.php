<?php
require 'core/database.php';
class Tenant {
    public $name;
    public $firstname;
    public $email;
    public $telNr;
    public $fk_memberstatus;

    function __construct($name, $firstname, $email, $fk_memberstatus, $telNr = null)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->fk_memberstatus = $fk_memberstatus;
        $this->telNr = $telNr;
    }

    /**
     * Return the TenantID of an element where name, firstname, email and meberstatus matches.
     */
    public function getTenantID() {
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT id FROM tenant WHERE :firstname, :name, :email, :fk_memberstatus");
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':fk_memberstatus', $fk_memberstatus);
            $statement->execute();
            return $statement->fetchAll()[0];
        } catch (PDOException $e) {
            echo "Verbindung zur DB fehlgeschlagen: $e";
        }
    }
}