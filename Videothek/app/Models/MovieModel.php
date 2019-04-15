<?php
class Movie {
    public $id;
    public $title;

    function __construct($title, $id = null)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * Rerturns an array with all the movies in the DB
     */
    static function getAllMovies() {
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT * FROM movie");
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }
}