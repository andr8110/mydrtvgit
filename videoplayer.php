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
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-sm-12 text-left videoTitle">
                    <h3>Blank (1:9)</h3>
                </div>
                <div class="col-sm-12 text-left videoInformation">
                    <div class="col-sm-12 programInfo">
                        <h5>program info</h5>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Culpa sit, maiores molestias vitae deserunt quasi dolorum ex. 
                        Culpa obcaecati asperiores doloribus reprehenderit, totam quisquam
                        fugit assumenda accusamus animi corrupti illum?</p>
                    </div>
                </div>
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
                <hr/>
                <div class="review-block">
                
                <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Vurdér selv filmen</label>
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
                              <textarea cla ss="form-control" name="addComment" id="addComment" rows="5"></textarea>
                   
			 <form class="form-horizontal" id="commentForm" >
                        <div class="form-group">
                            <div class="col-sm-8 text-right">
                                <button class="btn btn-success btn-circle text-uppercase" type="submit"
                                    id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit
                                    comment</button>
                            </div>
                        </div>
                    </form>

                <hr/>
                    <div class="row commentRow">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <!-- HER SKAL DER VÆRE STJERNER!!!!!!!!! -->
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                            <div class="col-sm-12 text-right">
                                <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse"
                                    href="#replyTwo"><span class="glyphicon glyphicon-comment"></span> 1 comment</a>
                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>
                                    Reply</a>
                            </div>
                        </div>



                        <div class="row response collapse" id="replyTwo">
                            <div class="col-sm-3 responseInformation">
                                <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                <div class="review-block-name"><a href="#">nktailor</a></div>
                                <div class="review-block-date">January 29, 2016<br />1 day ago</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="review-block-title">this was nice in buy</div>
                                <div class="review-block-description">this was nice in buy. this was nice in buy. this
                                    was nice in buy. this was nice in buy this was nice in buy this was nice in buy this
                                    was nice in buy this was nice in buy</div>
                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>
                                    Reply</a>
                            </div>


                        </div>

                    </div>
                    <hr/>
                
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



</div>
<?php
$sScript = 'videoplayer.js';
require_once './components/bottom.php';