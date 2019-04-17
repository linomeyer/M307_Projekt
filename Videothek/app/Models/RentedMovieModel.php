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

    static function createRent(string $name, string $vorname, string $email, string $telnr, string $rentstart, int $film, string $member, bool $rentstatus, bool $active, string $rentend){
        try {
            $pdo = connectToDatabase();
            $statement = $pdo->prepare("INSERT INTO rentmovie (`name`, firstname, email, telNr, rentStart, fk_movieID, fk_memberstatus, rentstatus, active, rentend) VALUES (:namme, :firstname, :email, :telNr, :rentStart, :movieId, :memberstatus, :rentstatus, :active, :rentend)");
            $statement->bindParam(':namme', $name);
            $statement->bindParam(':firstname', $vorname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telNr', $telnr);
            $statement->bindParam(':rentStart', $rentstart);
            $statement->bindParam(':movieId', $film);
            $statement->bindParam(':memberstatus', $member);
            $statement->bindParam(':rentstatus', $rentstatus);
            $statement->bindParam(':active', $active);
            $statement->bindParam(':rentend', $rentend);
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