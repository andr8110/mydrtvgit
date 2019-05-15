<?php

session_start();
require_once '../database.php';

try {


    $sQuery = $db->prepare('INSERT INTO `ratings`
                            VALUES (null, :sMovieId, :sUserId, :sRating, :sComment)');

    // $sQuery->bindValue(':sMovieId', $_SESSION['jUser']['id']);
    $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
    $sQuery->bindValue(':sRating', 2);
    $sQuery->bindValue(':sMovieId', 1);
    $sQuery->bindValue(':sComment', $_POST['addComment']);

    $sQuery->execute();
    $iReportId = $db->lastInsertId();
    if( !$sQuery->rowCount() ){
        echo '{"status":0, "message":"could not insert data"}'; 
        exit;
    }


    echo '{"status":1, "message":"Submit succes"}';
} catch (PDOException $e) {
    echo $e;
    echo '{"status":0, "message":"error"}';
}
