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
    $iCommentId = $db->lastInsertId();
    if( !$sQuery->rowCount() ){
        echo '{"status":0, "message":"could not insert data"}'; 
        exit;
    }

    $stmt = $db->prepare('SELECT ratings.*, users.name, users.name FROM ratings AS ratings 
                          INNER JOIN users AS users on ratings.user_fk = users.id
                          WHERE ratings.id = :rating_fk
                          AND users.id = :sUserId');
    $stmt->bindValue(':rating_fk', $iCommentId);
    $stmt->bindValue(':sUserId', $_SESSION['jUser']['id']);
    $stmt->execute();
    $aRatings = $stmt->fetchAll();
    echo json_encode($aRatings);
    exit();

} catch (PDOException $e) {
    echo $e;
    echo '{"status":0, "message":"error"}';
}
