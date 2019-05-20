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
                                <video class='d-block w-100' width='1280' height='625' src=video/" . $aMovie['path'] . "  frameborder='0'></video>
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
                            <video class='d-block w-100' width='250' height='145' src=video/" . $aMovieFavorite['path'] . "  frameborder='0'></video>                                        <div class='overlay'>
                                        <h2> " . $aMovieFavorite['title'] . " </h2>
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
                            <video class='d-block w-100' width='250' height='145' src=video/" . $aMovieCategory['path'] . "  frameborder='0'></video>
                                        <div class='overlay'>
                                        <h2> " . $aMovieCategory['title'] . "  </h2>
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
                            <video class='d-block w-100' width='250' height='145' src=video/" . $aWatchedMovie['path'] . "  frameborder='0'></video>
                                        <div class='overlay'>
                                        <h2> " . $aWatchedMovie['title'] . "  </h2>
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
                            <video class='d-block w-100' width='250' height='145' src=video/" . $aCategoryMovie['path'] . "  frameborder='0'></video>
                                        <div class='overlay'>
                                        <h2> " . $aCategoryMovie['title'] . "  </h2>
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
<!--Modal: modalCookie-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload">

   

      <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body">
        <div class="row d-flex justify-content-center align-items-center">

          <p class="pt-3 pr-2">We use cookies to improve your website experience</p>

          <a type="button" class="btn btn-primary btnLearnMore">Learn more <i class="fas fa-book ml-1"></i></a>
          <a type="button" class="btn btn-outline-primary waves-effect btnOK" data-dismiss="modal">Ok, thanks</a>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalCookie-->






<?php 
$sScript = 'index.js';
require_once './components/footerSide.php';
require_once './components/bottom.php';