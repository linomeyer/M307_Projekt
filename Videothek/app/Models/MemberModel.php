<?php
class Member { 
    public $status;
    public $rentDuration;

    function __construct($status, $rentDuration)
    {
        $this->status = $status;
        $this->rentDuration = $rentDuration;
    }
}
