<?php
require "dbconnection.php";
$dbcon = createDbConnection();


/*Lisää koodiin muuttaja nimeltä artist_id. 
Tiedosto hakee ja palauttaa JSONmuodossa artistin kaikkien kappaleiden nimet. */


$artist_id=1;


$sql = "SELECT Name FROM tracks
        INNER JOIN albums
        on tracks.AlbumId=albums.AlbumId
        WHERE albums.ArtistId=$artist_id;
        ";

$statement = $dbcon->prepare($sql);
$statement->execute();


$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

$jsonobject = json_encode($rows);

echo $jsonobject;