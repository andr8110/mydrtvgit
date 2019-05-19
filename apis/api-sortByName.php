<?php
  require_once '../database.php';

  try {
      $sQuery = $db->prepare('SELECT movies.*, genre.name  FROM `movies` AS movies
                              INNER JOIN genre_movies ON  movies.id  = genre_movies.movie_fk
                              INNER JOIN genre AS genre ON genre.id = genre_movies.genre_fk 
                              ORDER BY title');
      $sQuery->execute();

      $aMovies = $sQuery->fetchAll();
      echo json_encode($aMovies);  
  } catch (PDOException $ex) {
  echo ($ex);
  echo "Sorry, system is updating ...";
  }