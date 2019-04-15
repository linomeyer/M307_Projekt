<?php
class RentedMovie {
    public $id;
    public $rentStart;

    public $name;
    public $firstname;
    public $email;
    public $telNr;
    public $fk_memberstatus;

    function __construct($rentStart, $name, $firstname, $email, $fk_memberstatus, $telNr = null, $id = null)
    {
        $this->id = $id;
        $this->rentStart = $rentStart;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->fk_memberstatus = $fk_memberstatus;
        $this->telNr = $telNr;
    }
}