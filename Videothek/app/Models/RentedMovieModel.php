<?php
class RentedMovie {
    public $fk_movieID;
    public $fk_tenantID;
    public $rentStart;

    function __construct($fk_movieID, $fk_tenantID, $rentStart)
    {
        $this->fk_movieID = $fk_movieID;
        $this->fk_tenantID = $fk_tenantID;
        $this->rentStart = $rentStart;
    }
}