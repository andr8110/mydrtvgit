<?php
session_start();
$sTitle = 'video player';

$sCss = 'videoplayer.css';

require_once './components/top.php';
require_once './components/navSide.php';
?>

<div class="container contentWrapped">
    <div class="container-fluid backgroundColor">
        <div class="container videoPlayerContainer">
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="embed-responsive embed-responsive-16by9">

                        <?php
                        require_once 'database.php';

                        try {
                            $sQuery = $db->prepare('SELECT * FROM `movies`                       
                                                    WHERE id = :sMovieId ');

                            $sQuery->bindValue(':sMovieId', $_GET['movieID']);

                            $sQuery->execute();

                            $aMoviesChosen = $sQuery->fetchAll();
                            foreach ($aMoviesChosen as $aMovieChosen) {

                            echo "<img class='embed-responsive-item' src='" . $aMovieChosen['path'] . "'>
                                    </div>
                                    </div>
                                    <div class='col-sm-12 text-left videoTitle'>
                                        <h3>" . $aMovieChosen['title'] . " (1:9)</h3>
                                    </div>
                                    <div class='col-sm-12 text-left videoInformation'>
                                        <div class='col-sm-12 programInfo'>
                                            <h5>program info</h5>
                                            <p>" . $aMovieChosen['description'] . "</p>
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
            </div>




            <!-- INDSÆT ANBEFALINGER -->

            <div class="container ratingContainer">
                <div class="row">

                    <div class="col-sm-12">
                        <hr />
                        <div class="review-block">

                            <div class="container ratingContainer">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <hr />
                                        <div class="review-block">

                                            <form action="#" method="post" class="form-horizontal" id="commentForm"
                                                role="form">
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-4 control-label">Vurdér selv
                                                        filmen</label>
                                                    <div class="col-sm-8">
                                                        <span class="star-rating">
                                                            <input type="radio" name="rating" value="1"><i></i>
                                                            <input type="radio" name="rating" value="2"><i></i>
                                                            <input type="radio" name="rating" value="3"><i></i>
                                                            <input type="radio" name="rating" value="4"><i></i>
                                                            <input type="radio" name="rating" value="5"><i></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea cla ss="form-control" name="addComment"
                                                            id="addComment" rows="5"></textarea>


                                                        <div class="form-group">
                                                            <div class="col-sm-8 text-right">
                                                                <button
                                                                    class="btn btn-success btn-circle text-uppercase"
                                                                    type="submit" id="submitComment"><span
                                                                        class="glyphicon glyphicon-send"></span> Submit
                                                                    comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr />
                                            </form>

                                            <div id="comment-wrapper">

                                                <?php
                            require_once 'database.php';

                            try {
                                $sQuery = $db->prepare('SELECT ratings.*, users.name FROM `ratings` AS ratings
                                                        INNER JOIN users AS users on ratings.user_fk = users.id
                                                        WHERE user_fk = :sUserId
                                                        AND movie_fk = :sMovieId');

                                $sQuery->bindValue(':sUserId', $_SESSION['jUser']['id']);
                                $sQuery->bindValue(':sMovieId', $_GET['movieID']);
                                $sQuery->execute();

                                $aRatings = $sQuery->fetchAll();

                                foreach ($aRatings as $aRating) {

                                    echo " <div id='" . $aRating['id'] ." commentrow' class='row commentRow'>
                                                <div class='col-sm-3'>
                                                        <img src='http://dummyimage.com/60x60/666/ffffff&text=No+Image' class='img-rounded'>
                                                        <div class='review-block-name'><a href='#'>" . $aRating['name'] . "</a></div>
                                                        <div class='review-block-date'>January 29, 2016<br/>1 day ago</div>
                                                </div>
                                                <div class='col-sm-9'>
                                                        <div class='review-block-description'>" . $aRating['comment'] . "</div>
                                                        <div class='col-sm-12 text-right'>
                                                            <a class='btn btn-warning btn-circle text-uppercase' data-toggle='collapse'
                                                                href='#replyTwo'><span class='glyphicon glyphicon-comment'></span> 1 comment</a>
                                                            <a class='float-right btn btn-outline-primary ml-2 btnReply'> <i class='fa fa-reply'></i>
                                                                Reply</a>
                                                        </div>
                                                </div>
                                                <div class='offset-sm-6 col-sm-6 text-right replyCol'></div>
                                            </div>"; 
                                                }
                            } catch (PDOException $ex) {
                            echo ($ex);
                            echo "Sorry, system is updating ...";
                            }

                        ?>

                                            </div>
                                        </div>



                                        <!-- RESPONDS -->


                                        <?php
                            require_once 'database.php';

                            try {
                                $sQuery = $db->prepare('SELECT * FROM `response`
                                                        INNER JOIN users on response.user_fk = users.id
                                                        WHERE rating_fk IN 
                                                        (select id from ratings where rating_fk = :sRatingFk)');

                                $sQuery->bindValue(':sRatingFk', 1);
                                $sQuery->execute();

                                $aResponses = $sQuery->fetchAll();

                                foreach ($aResponses as $aResponse) {

                                    echo " <div class'container-test'>
                                    <div class='row response collapse' id='replyTwo'>
                                                <div class='col-sm-3 responseInformation'>
                                                    <img src='http://dummyimage.com/60x60/666/ffffff&text=No+Image' class='img-rounded'>
                                                    <div class='review-block-name'><a href='#'>" . $aResponse['name'] . "</a></div>
                                                    <div class='review-block-date'>January 29, 2016<br />1 day ago</div>
                                                </div>
                                                <div class='col-sm-9'>
                                                    <div class='review-block-description'>" . $aResponse['response'] . "</div>
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
                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>
<?php
$sScript = 'videoplayer.js';
require_once './components/footerSide.php';
require_once './components/bottom.php';