<?php
require "dbconnection.php";
$dbcon = createDbConnection();


/*Tiedostossa on parametreina playlistId. Poista koodilla tietokannasta kyseinen
soittolista ja soittolistabiisit (playlists, playlist_track)*/

$playlistid = 1;

try{
    $dbcon->beginTransaction();

    $statement = $dbcon->prepare("DELETE FROM playlist_track WHERE PlaylistId = ?");

    $statement->execute(array($playlistid));



    $statement = $dbcon->prepare("DELETE FROM playlists WHERE PlaylistId = ?");

    $statement->execute(array($playlistid));

  

    $dbcon->commit();
}catch(Exception $e){

    $dbcon->rollBack();

   echo $e->getMessage(); 
}