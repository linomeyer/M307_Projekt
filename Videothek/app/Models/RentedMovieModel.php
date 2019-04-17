<?php
class RentedMovie {
    public $movieId;

    public $name;
    public $firstname;
    public $email;
    public $telNr;
    public $fk_memberstatus;

    function __construct($name = null, $firstname = null, $email = null, $fk_memberstatus = null, $telNr = null, $movieId = null)
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
            $statement = $pdo->prepare("SELECT rentmovie.*, movie.title, member.*  FROM rentmovie LEFT JOIN movie ON rentmovie.fk_movieID = movie.id LEFT JOIN member ON rentmovie.fk_memberstatus = member.status WHERE active = 1");
            $statement->execute();

            $rentlist = $statement->fetchAll();
            return array_map( function($rent){
                $rent['rentend'] = date('Y.m.d', strtotime($rent['rentStart']) + (3600 * 24 * $rent['rentDuration']));
                if(strtotime($rent['rentend']) < strtotime('today')){
                    $rent['rentstatus'] = ':D';
                }
                else{
                    $rent['rentstatus'] = ':(';
                }
                return $rent;
            }, $rentlist);

        } catch(PDOException $e) {
            echo 'Verbindung zur DB fehlgeschlagen: ' . $e;
        }
    }



    public function getRentbyId(int $movieId){
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