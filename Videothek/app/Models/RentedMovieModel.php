<?php
class RentedMovie {
    public $id;

    public $name;
    public $firstname;
    public $email;
    public $telNr;
    public $fk_memberstatus;
    public $active;

    function __construct($name, $firstname, $email, $fk_memberstatus, $active, $telNr = null, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->fk_memberstatus = $fk_memberstatus;
        $this->active = $active;
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

    static function getRentbyId(int $id){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("SELECT * FROM rentmovie WHERE id = :id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    public function createRent(){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("INSERT INTO rentmovie (`name`, firstname, email, telNr, fk_movieID, fk_memberstatus, active) VALUES (:namme, :firstname, :email, :telNr, :movieId, :memberstatus, :active)");
            $statement->bindParam(':namme', $name);
            $statement->bindParam(':firstname', $vorname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telNr', $telnr);
            $statement->bindParam(':movieId', $film);
            $statement->bindParam(':memberstatus', $member);
            $statement->bindParam(':active', $active);
            $statement->execute();
            return $pdo->lastInsertId();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }

    static function updateRent($name, $firstname, $email, $phone, $movie, $rentstatus, $id){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("UPDATE rentmovie set `name` = :namme, 
                                                                        firstname = :firstname, 
                                                                        email = :email,
                                                                        telNr = :phone,
                                                                        fk_movieID = :movie,
                                                                        rentstatus = :rentstatus
                                                                        WHERE id = :id");
            $statement->bindParam(':id', $id);
            $statement->bindParam(':rentstatus', $rentstatus);
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

    static function deleteRent(int $id){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("ALTER TABLE rentmovie SET active = 0 WHERE id = :id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch();
        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }
}