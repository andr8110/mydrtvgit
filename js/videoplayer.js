// ****************************************
// CREATE AND READ
// ****************************************
$('#commentForm').submit(function (e) {
    e.preventDefault()
    $.ajax({
      url: "apis/api-insert-comment.php",
      method: "POST",
      data: $('#commentForm').serialize()
    }).always(function (jData){
      console.log(jData)
    //   if (jData.status == 1) {
    //     var sMovieId = $('input[name="txtDate"]').val();
    //     var sUserId = $('input[name="txtDate"]').val();
    //     var sRating = $('input[name="txtDate"]').val();
    //     var sComment = $('#selectBridges option:selected').text();

  
    //     var sHTML = `<div id='${jData.id}' class='report reportStatic'>
    //                     <div class='date reportStatic' contenteditable='false'>${sDate}</div>
    //                     <div class='companies reportStatic' contenteditable='false'>${sCompanies}</div>
    //                     <div class='selectBridges reportStatic' contenteditable='false'>${sBridges}</div>
    //                    </div>`
  
    //     $('#reports').prepend(sHTML)
    //     return
    //   }
    //   console.log('Cannot submit comment')
    })
  })