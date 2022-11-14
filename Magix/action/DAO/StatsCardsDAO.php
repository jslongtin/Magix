<?php
    require_once("action/DAO/Connection.php");
    
    // Toutes les méthodes qui gèrent les données liées aux usagers
    class StatsCardsDAO {

        public static function authenticate($username, $password) {
            $connection = Connection::getConnection();

            // ' or 1=1 or '1' = '1 <-- SQL injection
            $statement = $connection->prepare("SELECT * FROM users where username = ?");
            $statement->bindParam(1, $username); // Remplace le premier ? par $username
            $statement->setFetchMode(PDO::FETCH_ASSOC); // Retourne un dictionnaire
            $statement->execute();

            $result = null;

            // Le résultat de fetch va dans $row, et le if évalue si row est nul (pas de résultat), ou psa
            if ($row = $statement->fetch()) { // fetch retourne la première ligne.
                // var_dump($row);exit;

                if (password_verify($password, $row["password"])) {
                    $result = [];
                    $result["username"] = $row["username"];
                    $result["visibility"] = $row["visibility"];
                }

            }
            return $result;
        }
        
       
// version avec des inserts seulement
        public static function addCardPlayed($id){
            $connection = Connection::getConnection();
            $statement = $connection->prepare("INSERT INTO statsCards(id) VALUES (?)");
            $statement->bindParam(1, $id); 
            $statement->execute();
        }
        public static function getPopularite(){
            $connection = Connection::getConnection();
            $statement = $connection->prepare("SELECT idCarte , COUNT (idCarte) FROM statsCards  GROUP BY idCarte" );
            $statement->setFetchMode(PDO::FETCH_ASSOC); // Retourne un dictionnaire
            $statement->execute();
    
            return $statement->fetchAll();
        }
        
    }
    // public static function getAnswer(){
    //     $connection = Connection::getConnection();
    //     $statement = $connection->prepare("SELECT * FROM stack_answers " );
    
    //     $statement->setFetchMode(PDO::FETCH_ASSOC); // Retourne un dictionnaire
    //     $statement->execute();

    //     return $statement->fetchAll();
    // }

    // public static function addAnswer($author, $answer){
    //     $connection = Connection::getConnection();

    //     $statement = $connection->prepare("INSERT INTO  stack_answers(author,answer) VALUES ( ?,?)");
    //     $statement->bindParam(1, $author); // Remplace le premier ? par $username
    //     $statement->bindParam(2, $answer); // Remplace le deuxieme ? par $username
        
    //     $statement->execute();
    // }
    