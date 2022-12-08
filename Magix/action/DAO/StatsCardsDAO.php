<?php
require_once("action/DAO/Connection.php");

class StatsCardsDAO
{

    // version avec des inserts seulement
    public static function addCardPlayed($id)
    {
        $connection = Connection::getConnection();
        $statement = $connection->prepare("INSERT INTO statsCards(idCarte) VALUES (?)");
        $statement->bindParam(1, $id);
        $statement->execute();
    }
    public static function getPopularite()
    {
        $connection = Connection::getConnection();
        $statement = $connection->prepare("SELECT idCarte , COUNT (idCarte) FROM statsCards  GROUP BY idCarte");
        $statement->setFetchMode(PDO::FETCH_ASSOC); // Retourne un dictionnaire
        $statement->execute();

        return $statement->fetchAll();
    }
    public static function getMostPlayed()
    {
        $connection = Connection::getConnection();
        $statement = $connection->prepare("SELECT idCarte, COUNT (idCarte) as count FROM statsCards  GROUP BY idCarte ORDER BY count DESC LIMIT 1");
        $statement->setFetchMode(PDO::FETCH_ASSOC); // Retourne un dictionnaire
        $statement->execute();

        return $statement->fetch();
    }
    public static function clear()
    {
        $connection = Connection::getConnection();
        $statement = $connection->prepare("TRUNCATE TABLE statsCards");
        $statement->execute();
    }
}
