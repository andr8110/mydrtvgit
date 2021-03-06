<?php

?>

<div class="d-flex flex-row-reverse toggled" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark" id="sidebar-wrapper">
        <div class="row sideMenuTop">
            <div class="col-12 text-center">

            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `users`                       
                                                    WHERE id = :sUserId');
                            $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                            $sQuery->execute();

                            $aUserInfos = $sQuery->fetchAll();
                            foreach ($aUserInfos as $aUserInfo) {

                            echo "<img class='profilPicMenu' src='img/".$aUserInfo['path']."'>
                                    <div class='col-12'>
                                    <div contentEditable='true'><h3 class='profileName'>".$aUserInfo['name']. " ".$aUserInfo['lastname']. "</h3></div>
                                </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>

            </div>
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark">Se videre med profilen</a>

            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    INNER JOIN watched ON movies.id = watched.movie_fk
                                                    WHERE watched.user_fk = :sUserId
                                                    ORDER BY movie_fk DESC  LIMIT 1');
                            $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                            $sQuery->execute();

                            $aWatchedMovies = $sQuery->fetchAll();
                            foreach ($aWatchedMovies as $aWatchedMovie) {

                            echo "<div class='movie col-sm-12'>
                            <div class='hovereffect'>
                            <video class='d-block w-100' width='250' height='175' src=video/" . $aWatchedMovie['path'] . "  frameborder='0'></video>
                                        <div class='overlay'>
                                        <h2> " . $aWatchedMovie['title'] . " </h2>
                                            <a id='continueWatchingMovie' class='info' href='videoplayer.php?movieID=". $aWatchedMovie['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>



            <a href="#" class="list-group-item list-group-item-action bg-dark">Anbefalinger</a>

            <!-- DENNE HER SKAL EVENTUELT ÆNDRES SÅ DEN SORTER EFTER SIDST SETE CATEGORY / GENRE -->

            <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    WHERE category_fk = 2 
                                                    ORDER BY RAND() LIMIT 1');
                            $sQuery->execute();

                            $aMoviesCategory = $sQuery->fetchAll();
                            foreach ($aMoviesCategory as $aMovieCategory) {

                            echo "<div class='movie col-sm-12'>
                            <div class='hovereffect'>
                            <video class='d-block w-100' width='250' height='175' src=video/" . $aMovieCategory['path'] . "  frameborder='0'></video>
                                        <div class='overlay'>
                                        <h2> " . $aMovieCategory['title'] . " </h2>
                                            <a id='recommendedMovie' class='info' href='videoplayer.php?movieID=". $aMovieCategory['id'] . "'>Se film</a>
                                      
                                            </div>

                                            </div>
                                    </div>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>




            <a href="#" class="list-group-item list-group-item-action bg-dark nedersteLinks">Dine anmeldelser</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark">Dine Favoritter</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark">Dine kommentarer</a>
            <!-- <a href="#" class="list-group-item list-group-item-action bg-dark nedersteLinks"><i class="fas fa-cog"></i> Indstillinger</a> -->

            <div class="dropdown list-group-item list-group-item-action  nedersteLinks ">
                <button class="btn btnIndstillinger btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i> Indstillinger
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Slet bruger</a>

                </div>
            </div>


            <a href="logout.php" class="list-group-item list-group-item-action bg-dark "><i class="fas fa-sign-out-alt"></i> Log ud</a>
        </div>
    </div>

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <a href="index.php"><img src="img/DR-TV-streaming.png" class="navbar-brand"><img></a>

      </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="programmer.php">Programmer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Live-TV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TV-guide</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Børn</a>
                </li>
                <li class="nav-item">


                <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `users`                       
                                                    WHERE id = :sUserId');
                            $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                            $sQuery->execute();

                            $aUserImages = $sQuery->fetchAll();
                            foreach ($aUserImages as $aUserImage) {

                            echo "<button class='profileButton'>
                                <img src='img/".$aUserImage['path']."' class='profile_picture_toggle rounded-circle' id='menu-toggle'><img>
                                </button>";
                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }

                        ?>
                
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-md-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <form id="demo-2" class='frmSearch'>
                <input id='txtSearch' type="text" placeholder="Search"> 
                <button class='btnSearch' type='submit'><i class="fas fa-search"></i></button>
            </form>
            
        </div>
    </nav>