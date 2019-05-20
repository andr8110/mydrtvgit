// ****************************************
// CREATE AND READ
// ****************************************


// PLAY-PAUSE BUTTON
var playOrPause = false
var vid = document.getElementById("video")
var btn = document.getElementById('btnPlayPause')

function playVideo() {
  if (playOrPause) {
    vid.pause()
    document.getElementById('btnPlayPause').innerHTML = "<i class='fas fa-play'></i>"
  } else {
    vid.play()
    document.getElementById('btnPlayPause').innerHTML = "<i class='fas fa-pause'></i>"
  }
  playOrPause = !playOrPause
}

btn.addEventListener("mouseover", function () {
  if (playOrPause) {
    document.getElementById('btnPlayPause').style.visibility = "visible"
  }
})

vid.addEventListener("mouseleave", mouseLeave)
function mouseLeave() {
  if (playOrPause) {
    document.getElementById('btnPlayPause').style.visibility = "hidden"
  }
}

vid.addEventListener("mouseover", mouseOver)
function mouseOver() {
  if (playOrPause) {
    document.getElementById('btnPlayPause').style.visibility = "visible"
  }
}



// CLICK SUBMIT COMMENT
$('#commentForm').submit(function (e) {
  e.preventDefault()
  $.ajax({
    url: "apis/api-insert-comment.php",
    method: "POST",
    data: $('#commentForm').serialize(),
    dataType: 'JSON'
  }).always(function (jData) {
    console.log(jData)
    if (jData.status !== 0) {


      var sHTML = `<div id='${jData[0].id} commentrow' class='row commentRow'>
                      <div class='col-sm-3'>
                      <img src='http://dummyimage.com/60x60/666/ffffff&text=No+Image' class='img-rounded'>
                      <div class='review-block-name'><a href='#'>${jData[0].name}</a></div>
                      <div class='review-block-date'>January 29, 2016<br/>1 day ago</div>
                  </div>
                  <div class='col-sm-9'>
                      <div class='review-block-description'>${jData[0].comment}</div>
                      <div class='col-sm-12 text-right'>
                          <a class='btn btn-warning btn-circle text-uppercase' data-toggle='collapse'
                              href='#replyTwo'><span class='glyphicon glyphicon-comment'></span> 1 comment</a>
                          <a class='float-right btn btn-outline-primary ml-2'> <i class='fa fa-reply'></i>
                              Reply</a>
                      </div>
                      </div>`

      $('#comment-wrapper').prepend(sHTML)
      return
    }
    console.log('Cannot submit comment')
  })
})



// CLICK BUTTON REPLY
$(document).on("click", ".btnReply", function () {
  var sHTML2 = `<form id='formResponse'  method="post">
                      <textarea name='txtReply' class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                      <button
                          class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment
                      </button>
                   </form>`

  $('.replyCol').prepend(sHTML2)
  return
})