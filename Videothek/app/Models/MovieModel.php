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

    static function getAllMovieIds(){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT id FROM movie");
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    public function getMovieById(int $id){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT title FROM movie WHERE id = :id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    static function getAllMoviesNames() {
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT title FROM movie");
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }
}