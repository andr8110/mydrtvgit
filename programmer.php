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
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5>Sorter efter</h5>
                    <div class="list-group">
                        <a href="#" class="filter-punkt list-group-item list-group-item-action">Navn</a>
                        <a href="#" class="filter-punkt list-group-item list-group-item-action">Ratings</a>
                        <a href="#" class="filter-punkt list-group-item list-group-item-action">Udgivelsesdato</a>
                        <a href="#" class="filter-punkt list-group-item list-group-item-action">My DR TV bedømmelser</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h5>Genre</h5>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Drama">Drama</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Dokumentar">Dokumentar</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Kultur">Kultur</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Natur">Natur og viden</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Nyheder">Nyheder og aktualitet</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Sport">Sport</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Underholdning">Underholdning</label>
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
                    <h5>Type</h5>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Film">Film</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="Serie">Serie</label>
                    </div>
                </div>
            </div>
            <div class="row form-inline my-2 my-md-0 d-flex justify-content-end">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find nu</button>
            </div>
        </div>



        <div class="container">
            <div class="row alfabetFiltrering">
                <div class="col-sm-12">
                    <a href="#" class="filter-bogstav btn btn-default">A</a>
                    <a href="#" class="filter-bogstav btn btn-default">B</a>
                    <a href="#" class="filter-bogstav btn btn-default">C</a>
                    <a href="#" class="filter-bogstav btn btn-default">D</a>
                    <a href="#" class="filter-bogstav btn btn-default">E</a>
                    <a href="#" class="filter-bogstav btn btn-default">F</a>
                    <a href="#" class="filter-bogstav btn btn-default">G</a>
                    <a href="#" class="filter-bogstav btn btn-default">H</a>
                    <a href="#" class="filter-bogstav btn btn-default">I</a>
                    <a href="#" class="filter-bogstav btn btn-default">J</a>
                    <a href="#" class="filter-bogstav btn btn-default">K</a>
                    <a href="#" class="filter-bogstav btn btn-default">L</a>
                    <a href="#" class="filter-bogstav btn btn-default">M</a>
                    <a href="#" class="filter-bogstav btn btn-default">N</a>
                    <a href="#" class="filter-bogstav btn btn-default">O</a>
                    <a href="#" class="filter-bogstav btn btn-default">P</a>
                    <a href="#" class="filter-bogstav btn btn-default">Q</a>
                    <a href="#" class="filter-bogstav btn btn-default">R</a>
                    <a href="#" class="filter-bogstav btn btn-default">S</a>
                    <a href="#" class="filter-bogstav btn btn-default">T</a>
                    <a href="#" class="filter-bogstav btn btn-default">U</a>
                    <a href="#" class="filter-bogstav btn btn-default">V</a>
                    <a href="#" class="filter-bogstav btn btn-default">W</a>
                    <a href="#" class="filter-bogstav btn btn-default">X</a>
                    <a href="#" class="filter-bogstav btn btn-default">Y</a>
                    <a href="#" class="filter-bogstav btn btn-default">Z</a>
                    <a href="#" class="filter-bogstav btn btn-default">Æ</a>
                    <a href="#" class="filter-bogstav btn btn-default">Ø</a>
                    <a href="#" class="filter-bogstav btn btn-default">Å</a>
                    <a href="#" class="filter-bogstav btn btn-default"></a>
                </div>
            </div>

            <div class="row programs-list">
                <div class="col-sm-12">
                    <ul class="col-xs-12 col-sm-12 col-md-12 col-lg-12">





                    <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`');
                            $sQuery->execute();

                            $aMovies = $sQuery->fetchAll();
                            foreach ($aMovies as $aMovie)  {

                            echo "<li class='list-inline-item col-xs-12 col-sm-6 col-md-3 col-lg-3'>
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