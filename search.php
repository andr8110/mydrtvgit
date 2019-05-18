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
    <a id='advancedSearchLink' href="advancedSearch.php"><p class='advancedSearch'>Advanced Search</p></a>
    <div id='searchResult'>
        
    <?php
    // echo $_GET['searchName'].'%';
    require_once 'database.php';

    try {
        $sQuery=$db->prepare('SELECT * FROM movies 
                                WHERE title LIKE :sTitle');
        $sQuery->bindValue(':sTitle', $_GET['searchName'].'%');
        $sQuery->execute();

        $aResults = $sQuery->fetchAll();
        // echo json_encode($aResults);
        
        foreach ($aResults as $aResult) {

        echo "<div class='movie col-sm-3'>
        <div class='hovereffect'>
                    <img src=" . $aResult['path'] . ">
                    <div class='overlay'>
                    <h2> " . $aResult['title'] . " 
                        " . $aResult['description'] . "
                        " . $aResult['production'] . "
                        " . $aResult['year'] . " </h2>
                        <a id=" . $aResult['id'] . " class='info' href='videoplayer.php?movieID=". $aResult['id'] . "'>Se film</a>
                  
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