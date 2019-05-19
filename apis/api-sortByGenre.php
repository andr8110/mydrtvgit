<?php
require_once '../database.php';

if (!empty($_GET['aGenre'])) {
    $aGenre = $_GET['aGenre'];
    // echo json_encode($aGenre);
} else {
    $aGenre = ["action", "horror", "fantasy", "natur og viden", "nyheder og aktualitet", "sport", "comic"];
    // exit();
}

// add quotes
function add_quotes($str) {
    return sprintf("'%s'", $str);
}
// implodes the array - ('fantasy', 'horror')
$in = '(' . implode(',', array_map('add_quotes', $aGenre)) .')';


try {
    $sQuery = $db->prepare('SELECT movies.*, genre.name  FROM `movies` AS movies
                            INNER JOIN genre_movies ON  movies.id  = genre_movies.movie_fk
                            INNER JOIN genre AS genre ON genre.id = genre_movies.genre_fk
                            WHERE genre.name IN'.$in);                      
    $sQuery->execute();
    $aMovies = $sQuery->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($aMovies);
} catch (PDOException $ex) {
    echo ($ex);
    echo "Sorry, system is updating ...";
}
