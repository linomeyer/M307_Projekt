<?php
class Movie {
    public $id;
    public $title;

    function __construct($title, $id = null)
    {
        $this->id = $id;
        $this->title = $title;
    }
}