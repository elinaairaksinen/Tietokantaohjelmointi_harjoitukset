<?php
require "dbconnection.php";
$dbcon = createDbConnection();

$playlist_id=3;




$sql = "SELECT Name, Composer FROM tracks
        INNER JOIN playlist_track
        on tracks.TrackId=playlist_track.TrackId
        WHERE playlist_track.PlaylistId=$playlist_id;
        ";

$statement = $dbcon->prepare($sql);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo "<h2>" . $row["Name"] . " - " . $row["Composer"] . "</h2>";
}
