<?php
// check if the user is logged in
// if not logged in - take the user to the login page
session_start();
if (!$_SESSION['jUser']) {
    header('location: login.php');
}

$sTitle = 'Seach';

$sCss = 'index.css';

require_once './components/top.php';
require_once './components/navSide.php';
?>

<div id='page-content-wrapper'>
    <h1 class='searhResultHeader1'>Search Result</h1>
    <div id='searchResult'>
        
    <?php
    // echo $_GET['searchName'].'%';
    require_once 'database.php';

    try {
        $sQuery=$db->prepare('SELECT * FROM movies 
                                WHERE title LIKE :sTitle');
        $sQuery->bindValue(':sTitle', $_GET['searchName'].'%');
        $sQuery->execute();

        $aMovies = $sQuery->fetchAll();
        // echo json_encode($aMovies);
        
        foreach ($aMovies as $aMovie) {

        echo "<div class='movie col-sm-3'>
        <div class='hovereffect'>
                    <img src=" . $aMovie['path'] . ">
                    <div class='overlay'>
                    <h2> " . $aMovie['title'] . " 
                        " . $aMovie['description'] . "
                        " . $aMovie['production'] . "
                        " . $aMovie['year'] . " </h2>
                        <a class='info' href='videoplayer.php?movieID=". $aMovie['id'] . "'>Se film</a>
                  
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









<?php 
$sScript = 'search.js';
require_once './components/bottom.php';