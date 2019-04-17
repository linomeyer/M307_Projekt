<?php
class RentedMovie {
    public $movieId;

    public $name;
    public $firstname;
    public $email;
    public $telNr;
    public $fk_memberstatus;

    function __construct($name, $firstname, $email, $fk_memberstatus, $telNr = null, $movieId = null)
    {
        $this->movieId = $movieId;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->fk_memberstatus = $fk_memberstatus;
        $this->telNr = $telNr;
    }

    static function getAllRentedMovies() {
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT * FROM rentmovie WHERE active = 1");
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    static function getRentbyId(int $movieId){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT * FROM rentmovie WHERE id = :id");
            $statement->bindParam(':id', $movieId);
            $statement->execute();
            return $statement->fetch();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    public function createRent(){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("INSERT INTO rentmovie (`name`, firstname, email, telNr, fk_movieID, fk_memberstatus) VALUES (:namme, :firstname, :email, :telNr, :movieId, :memberstatus)");
            $statement->bindParam(':namme', $name);
            $statement->bindParam(':firstname', $vorname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telNr', $telnr);
            $statement->bindParam(':movieId', $film);
            $statement->bindParam(':memberstatus', $member);
            $statement->execute();
            return $pdo->lastInsertId();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    public function updateRent(){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("UPDATE rentmovie set `name` = :namme, 
                                        firstname = :firstname, 
                                        email = :email,
                                        telNr = :phone,
                                        fk_movieID = :movie,
                                        WHERE id = :id");
            $statement->bindParam(':id', $movieId);
            $statement->bindParam(':movie', $movie);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':namme', $name);

            $statement->execute();

        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    static function deleteRent(int $movieId){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("ALTER TABLE rentmovie SET active = 0 WHERE id = :id");
            $statement->bindParam(':id', $movieId);
            $statement->execute();
            return $statement->fetch();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }
}