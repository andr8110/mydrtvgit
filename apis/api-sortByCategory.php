<?php
require_once '../database.php';

if (!empty($_GET['aCategory'])) {
    $aCategory = $_GET['aCategory'];
    // echo json_encode($aGenre);
} else {
    $aCategory = ["movie", "serie"];
    // exit();
}

// add quotes
function add_quotes($str) {
    return sprintf("'%s'", $str);
}
// implodes the array - ('fantasy', 'horror')
$in = '(' . implode(',', array_map('add_quotes', $aCategory)) .')';


try {
    $sQuery = $db->prepare('SELECT *  FROM `movies` AS movies
                            INNER JOIN category ON  movies.category_fk  = category.id
                            WHERE name IN'.$in);                      
    $sQuery->execute();
    $aMovies = $sQuery->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($aMovies);
} catch (PDOException $ex) {
    echo ($ex);
    echo "Sorry, system is updating ...";
}
