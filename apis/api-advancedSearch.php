<?php 
// echo $_POST['radioCategory'];

require_once '../database.php';

try {
    $sQuery=$db->prepare('SELECT * FROM movies 
                            WHERE title LIKE :sTitle
                            AND category_fk = :sCategoryValue
                            AND production LIKE :sProduction
                            AND year LIKE :iYear');
    $sQuery->bindValue(':sTitle', $_POST['txtTitle'].'%');
    $sQuery->bindValue(':sCategoryValue', $_POST['radioCategory']);
    $sQuery->bindValue(':sProduction', $_POST['txtProduction'].'%');
    $sQuery->bindValue(':iYear', $_POST['txtYear'].'%');
    $sQuery->execute();

    $aMovies = $sQuery->fetchAll();
    if (count($aMovies)) {
        echo json_encode($aMovies);
    } else {
        echo '{"status":0, "message":"Could not find a result"}';
    }
    exit();
} catch (PDOException $ex) {
echo ($ex);
echo "Sorry, system is updating ...";
}