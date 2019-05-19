<?php
session_start();
$sTitle = 'Programmer';

$sCss = 'programmer.css';

require_once './components/top.php';
require_once './components/navSide.php';
?>


    <div id="page-content-wrapper">
        <div id="filter" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-inline my-2 my-md-0 d-flex justify-content-center">
                        <input id='programSearch' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button id='btnProgramSearch' class="btn btn-outline-success my-2 my-sm-0" type="button">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5>Sorter efter</h5>
                    <div class="list-group">
                    <span id='btnSortByName' class="filter-punkt list-group-item list-group-item-action">Navn</span>
                    <span class="filter-punkt list-group-item list-group-item-action">Ratings</span>
                    <span class="filter-punkt list-group-item list-group-item-action">Udgivelsesdato</span>
                    <span class="filter-punkt list-group-item list-group-item-action">My DR TV bedømmelser</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h5>Genre</h5>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="action">Action</label>
                    </div>
                    <div class="checkbox checkbox_genre ">
                        <label><input type="checkbox" value="horror">Horror</label>
                    </div>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="fantasy">Fantasy</label>
                    </div>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="Natur">Natur og viden</label>
                    </div>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="Nyheder">Nyheder og aktualitet</label>
                    </div>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="Sport">Sport</label>
                    </div>
                    <div class="checkbox checkbox_genre">
                        <label><input type="checkbox" value="comic">Comic</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h5>Kanal</h5>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Dr1">Dr1</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="DR2">DR2</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="DR3">DR3</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="DRK">DRK</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Ramasjang">Ramasjang</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Ultra">Ultra</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h5>Kategori</h5>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Film">Film</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Serie">Serie</label>
                    </div>
                </div>
            </div>
            <div class="row form-inline my-2 my-md-0 d-flex justify-content-end">
                <button id='btnResetSort' class="btn btn-outline-success my-2 my-sm-0" type="button">Reset</button>
            </div>
        </div>



        <div class="container">
            <div class="row alfabetFiltrering">
                <div class="col-sm-12">
                    <span href="#" class="filter-bogstav btn btn-default">A</span>
                    <span href="#" class="filter-bogstav btn btn-default">B</span>
                    <span href="#" class="filter-bogstav btn btn-default">C</span>
                    <span href="#" class="filter-bogstav btn btn-default">D</span>
                    <span href="#" class="filter-bogstav btn btn-default">E</span>
                    <span href="#" class="filter-bogstav btn btn-default">F</span>
                    <span href="#" class="filter-bogstav btn btn-default">G</span>
                    <span href="#" class="filter-bogstav btn btn-default">H</span>
                    <span href="#" class="filter-bogstav btn btn-default">I</span>
                    <span href="#" class="filter-bogstav btn btn-default">J</span>
                    <span href="#" class="filter-bogstav btn btn-default">K</span>
                    <span href="#" class="filter-bogstav btn btn-default">L</span>
                    <span href="#" class="filter-bogstav btn btn-default">M</span>
                    <span href="#" class="filter-bogstav btn btn-default">N</span>
                    <span href="#" class="filter-bogstav btn btn-default">O</span>
                    <span href="#" class="filter-bogstav btn btn-default">P</span>
                    <span href="#" class="filter-bogstav btn btn-default">Q</span>
                    <span href="#" class="filter-bogstav btn btn-default">R</span>
                    <span href="#" class="filter-bogstav btn btn-default">S</span>
                    <span href="#" class="filter-bogstav btn btn-default">T</span>
                    <span href="#" class="filter-bogstav btn btn-default">U</span>
                    <span href="#" class="filter-bogstav btn btn-default">V</span>
                    <span href="#" class="filter-bogstav btn btn-default">W</span>
                    <span href="#" class="filter-bogstav btn btn-default">X</span>
                    <span href="#" class="filter-bogstav btn btn-default">Y</span>
                    <span href="#" class="filter-bogstav btn btn-default">Z</span>
                    <span href="#" class="filter-bogstav btn btn-default">Æ</span>
                    <span href="#" class="filter-bogstav btn btn-default">Ø</span>
                    <span href="#" class="filter-bogstav btn btn-default">Å</span>
                    <span href="#" class="filter-bogstav btn btn-default"></span>
                </div>
            </div>

            <div class="row programs-list">
                <div class="col-sm-12">
                    <ul id='archiveContainer' class="col-xs-12 col-sm-12 col-md-12 col-lg-12">





                    <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT movies.*, genre.name  FROM `movies` AS movies
                                                    INNER JOIN genre_movies ON  movies.id  = genre_movies.movie_fk
                                                    INNER JOIN genre AS genre ON genre.id = genre_movies.genre_fk');
                            $sQuery->execute();

                            $aMovies = $sQuery->fetchAll(PDO::FETCH_ASSOC);
                            // echo json_encode($aMovies);
                            foreach ($aMovies as $aMovie)  {

                            echo "<li data-name='".$aMovie['title']."' data-genre='".$aMovie['name']."' class='list-inline-item archiveItem col-xs-12 col-sm-6 col-md-3 col-lg-3'>
                                  <a href='videoplayer.php?movieID=". $aMovie['id'] . "'><span
                                    class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left programListColFix programTitle'>
                                    " . $aMovie['title'] . "</span></a>
                                  </li>";

                                                
                                            }
                        } catch (PDOException $ex) {
                        echo ($ex);
                        echo "Sorry, system is updating ...";
                        }
                        
                        ?>

                    </ul>
                </div>
            </div>

        </div>


    </div>










</div>
</div>






<?php
$sScript = 'programmer.js';
require_once './components/footerSide.php';
require_once './components/bottom.php';