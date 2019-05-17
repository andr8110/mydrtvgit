<?php
// check if the user is logged in
// if not logged in - take the user to the login page
session_start();
if (!$_SESSION['jUser']) {
    header('location: login.php');
}

$sTitle = 'Home';

$sCss = 'index.css';

require_once './components/top.php';
require_once './components/navSide.php';
?>





<!-- PAGE CONTENT -->
<div id="page-content-wrapper">
    <!-- KARUSSEL -->
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">


                <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`');
                            $sQuery->execute();

                            $aMovies = $sQuery->fetchAll();

                            $activeClass = "active";
                            foreach ($aMovies as $aMovie) {

                                echo "<div class='carousel-item " . $activeClass . " '>
                                        <img src=" . $aMovie['path'] . " class='d-block w-100' alt='...'>
                                        <div class='carousel-caption d-none d-md-block'>
                                            <h2>" . $aMovie['title'] . "</h2>
                                            <p>" . $aMovie['year'] . "</p>
                                        </div>
                                    </div>";
                                    $activeClass = ""; 
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>



            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>



    <!-- TILE STRUCTURE -->
    <div class="container">

        <div class='row text-center'>
            <h3 class='headermessage'>Favoritter</h3>
        </div>
        <div class='row'>


            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    INNER JOIN favorites ON movies.id = favorites.movie_fk
                                                    WHERE favorites.user_fk = :sUserId 
                                                    ORDER BY RAND() LIMIT 6');
                            $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                            $sQuery->execute();

                            $aMoviesFavorite = $sQuery->fetchAll();
                            foreach ($aMoviesFavorite as $aMovieFavorite) {

                            echo "<div class='movie col-sm-3'>
                            <div class='hovereffect'>
                                        <img src=" . $aMovieFavorite['path'] . ">
                                        <div class='overlay'>
                                        <h2> " . $aMovieFavorite['title'] . " 
                                            " . $aMovieFavorite['description'] . "
                                            " . $aMovieFavorite['production'] . "
                                            " . $aMovieFavorite['year'] . " </h2>
                                            <a class='info' href='videoplayer.php?movieID=". $aMovieFavorite['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>

        </div>




        <div class='row text-center'>
            <h3 class='headermessage'>Anbefalet</h3>
        </div>
        <div class='row'>

            <!-- DENNE HER SKAL EVENTUELT ÆNDRES SÅ DEN SORTER EFTER SIDST SETE CATEGORY / GENRE -->

            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    WHERE category_fk = 2 
                                                    ORDER BY RAND() LIMIT 6');
                            $sQuery->execute();

                            $aMoviesCategory = $sQuery->fetchAll();
                            foreach ($aMoviesCategory as $aMovieCategory) {

                            echo "<div class='movie col-sm-3'>
                            <div class='hovereffect'>
                                        <img src=" . $aMovieCategory['path'] . ">
                                        <div class='overlay'>
                                        <h2> " . $aMovieCategory['title'] . " 
                                            " . $aMovieCategory['description'] . "
                                            " . $aMovieCategory['production'] . "
                                            " . $aMovieCategory['year'] . " </h2>
                                            <a class='info' href='videoplayer.php?movieID=". $aMovieCategory['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>

        </div>



        <div class='row text-center'>
            <h3 class='headermessage'>Se dem igen</h3>
        </div>
        <div class='row'>


            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    INNER JOIN watched ON movies.id = watched.movie_fk
                                                    WHERE watched.user_fk = :sUserId
                                                    ORDER BY movie_fk DESC  LIMIT 6');
                            $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                            $sQuery->execute();

                            $aWatchedMovies = $sQuery->fetchAll();
                            foreach ($aWatchedMovies as $aWatchedMovie) {

                            echo "<div class='movie col-sm-3'>
                            <div class='hovereffect'>
                                        <img src=" . $aWatchedMovie['path'] . ">
                                        <div class='overlay'>
                                        <h2> " . $aWatchedMovie['title'] . " 
                                            " . $aWatchedMovie['description'] . "
                                            " . $aWatchedMovie['production'] . "
                                            " . $aWatchedMovie['year'] . " </h2>
                                            <a class='info' href='videoplayer.php?movieID=". $aWatchedMovie['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>

        </div>


        <div class='row text-center'>
            <h3 class='headermessage'>Live TV</h3>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/Skærmbillede 2019-05-17 kl. 19.38.57-02.png">
            </div>
           <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/dr2-02.png">
            </div>
            <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/dr3-02.png">
            </div>
           
        </div>
        <div class="row">
           <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/drk-02.png">
            </div>
            <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/rama-02.png">
            </div>
            <div class="col-sm-12 col-md-4">
                <img class="liveTvImg" src="img/ultra-02.png">
            </div>
        </div>


        <div class='row text-center'>
            <h3 class='headermessage'>Komedie</h3>
        </div>
        <div class='row'>


            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    INNER JOIN genre_movies ON  movies.id  = genre_movies.movie_fk
                                                    INNER JOIN genre ON genre.id = genre_movies.genre_fk
                                                    WHERE genre_fk = 1 
                                                    ORDER BY RAND() LIMIT 6');
                            $sQuery->execute();

                            $aCategoryMovies = $sQuery->fetchAll();
                            foreach ($aCategoryMovies as $aCategoryMovie) {

                            echo "<div class='movie col-sm-3'>
                            <div class='hovereffect'>
                                        <img src=" . $aCategoryMovie['path'] . ">
                                        <div class='overlay'>
                                        <h2> " . $aCategoryMovie['title'] . " 
                                            " . $aCategoryMovie['description'] . "
                                            " . $aCategoryMovie['production'] . "
                                            " . $aCategoryMovie['year'] . " </h2>
                                            <a class='info' href='videoplayer.php?movieID=". $aMovieCategory['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>

        </div>




    </div>
    <!-- CONTAINER END -->



</div>
<!-- PAGE CONTENT WRAPPER END -->
</div>
<!-- D FLEX WRAPPER END -->





<?php 
$sScript = 'index.js';
require_once './components/footerSide.php';
require_once './components/bottom.php';