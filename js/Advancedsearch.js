$("#frmAdvancedSearch").submit(function(e) {
    e.preventDefault();
    var removeDivs = $('.searchMovie')
    removeDivs.remove();
    // console.log('hej')


    $.ajax({
        url: "apis/api-advancedSearch.php",
        method: "POST",
        data: $('#frmAdvancedSearch').serialize(),
        dataType: "JSON"
      }).always(function (jData) {
        // console.log(jData)
        if (jData.status !== 0) { 
          // console.log('succes');
          for (x in jData) {
            // console.log(jData[x]);
            var resultDiv = `<div class='movie searchMovie col-sm-3'> <div class='hovereffect'> <img src="${jData[x].path}"> <div class='overlay'> <h2> ${jData[x].title} ${jData[x].description} ${jData[x].production} ${jData[x].year} </h2> <a class='info' href='videoplayer.php?movieID=${jData[x].id}'>Se film</a></div></div></div>`
            $('#advancedSearchResultContainer').append(resultDiv)
          }
        }
    
      })
  }); 