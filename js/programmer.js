// FOR THE BIG SEARH FIELD!
$(document).on("click", "#btnProgramSearch", function () {
    // loop though the archive Items
    $(".archiveItem").each(function () {
        // get the data name of the value 
        var sArchiveItemName = $(this).attr('data-name').toLowerCase()
        // get the value of the input field
        var sSearchFor = $("#programSearch").val().toLowerCase()
        // includes returns true or false
        // does the archive Items name includes something in the input field
        var bMatch = sArchiveItemName.startsWith(sSearchFor)
        // if there is not a match - hide the products in the screen
        if (!bMatch) {
            $(this).fadeOut(300)
        } else {
            $(this).fadeIn(300)
        }

    })
})

/*****************************************************************************************************************/
// FOR ALL THE LITTLE LETTERS!
$(document).on("click", ".filter-bogstav", function () {
    // console.log('bogstav nu!')
    var sLetter = $(this).text().toLowerCase();
    // console.log(sLetter)
    // loop though the archive Items
    $(".archiveItem").each(function () {
        // get the data name of the value 
        var sArchiveItemName = $(this).attr('data-name').toLowerCase()
        // includes returns true or false
        // does the archive Items name includes something in the input field
        var bMatch = sArchiveItemName.startsWith(sLetter)
        // if there is not a match - hide the products in the screen
        if (!bMatch) {
            $(this).fadeOut(300)
        } else {
            $(this).fadeIn(300)
        }

    })
})

/*****************************************************************************************************************/
// SORT BY NAAAAAME!!!!
$(document).on("click", "#btnSortByName", function () {
    // console.log('Sort after name')
    var deleteDiv = $('.archiveItem')
    

    $.ajax({
        url: "apis/api-sortByName.php",
        method: "GET",
        dataType: "JSON"
      }).always(function (jData) {
        // console.log(jData)
        if (jData.status !== 0) {
          deleteDiv.remove(); 
        //   console.log('succes');
          for (x in jData) {
            // console.log(jData[x]);
            var resultDiv = `<li data-name='${jData[x].title}' data-genre='${jData[x].name}' class='list-inline-item archiveItem col-xs-12 col-sm-6 col-md-3 col-lg-3'><a href='videoplayer.php?movieID=${jData[x].id}'><span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left programListColFix programTitle'>${jData[x].title}</span></a></li>`
            $('#archiveContainer').append(resultDiv)
          }
        }
    
      })

 })

/*****************************************************************************************************************/
// SORT BY GENRE NOOOOW!
var aGenre = [];
var checkbox = $('.checkbox_genre').children().find('input');
$(checkbox).change(function() {
    var sGenre = $(this).val()
    if(this.checked) {
        //ADD genre to array
        aGenre.push(sGenre)
        // console.log(aGenre);
        sortByGenre()
    } else {
        // DELETE genre from array
        aGenre.splice($.inArray(sGenre, aGenre),1);
        // console.log(aGenre);
        sortByGenre()
    }
});
function sortByGenre() {
    // console.log(aGenre)
    var deleteDiv = $('.archiveItem')

    $.ajax({
        url: "apis/api-sortByGenre.php",
        method: "GET",
        data: {aGenre: aGenre},
        dataType: "JSON"
        }).always(function (jData) {
        // console.log(jData)
        if (jData.status !== 0) {
            deleteDiv.remove(); 
        //console.log('succes');
            for (x in jData) {
            // console.log(jData[x]);
            var resultDiv = `<li data-name='${jData[x].title}' data-genre='${jData[x].name}' class='list-inline-item archiveItem col-xs-12 col-sm-6 col-md-3 col-lg-3'><a href='videoplayer.php?movieID=${jData[x].id}'><span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left programListColFix programTitle'>${jData[x].title}</span></a></li>`
            $('#archiveContainer').append(resultDiv)
            }
        }
    })
}


/*****************************************************************************************************************/
// SORT BY CATEGORY
var aCategory = [];
var checkbox = $('.checkbox_category').children().find('input');
$(checkbox).change(function() {
    var sCategory = $(this).val()
    if(this.checked) {
        //If check do something
        //ADD genre to array
        aCategory.push(sCategory)
        console.log(sCategory);
        sortByCategory()
    } else {
        //If not check do something
        // DELETE genre from array
        aCategory.splice($.inArray(sCategory, aCategory),1);
        console.log(sCategory);
        sortByCategory()
    }
    // console.log(aCategory);
});

function sortByCategory() {
    // console.log('category')
     // console.log(aGenre)
     var deleteDiv = $('.archiveItem')

     $.ajax({
         url: "apis/api-sortByCategory.php",
         method: "GET",
         data: {aCategory: aCategory},
         dataType: "JSON"
         }).always(function (jData) {
         console.log(jData)
         if (jData.status !== 0) {
             deleteDiv.remove(); 
         //console.log('succes');
             for (x in jData) {
             // console.log(jData[x]);
             var resultDiv = `<li data-name='${jData[x].title}' data-genre='${jData[x].name}' class='list-inline-item archiveItem col-xs-12 col-sm-6 col-md-3 col-lg-3'><a href='videoplayer.php?movieID=${jData[x].id}'><span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left programListColFix programTitle'>${jData[x].title}</span></a></li>`
             $('#archiveContainer').append(resultDiv)
             }
         }
     })
}





/*****************************************************************************************************************/
// RESET THE SORT / FILTERING
$(document).on("click", "#btnResetSort", function () {
    // console.log('Reset')
    var deleteDiv = $('.archiveItem')
    
    $.ajax({
        url: "apis/api-resetSort.php",
        method: "GET",
        dataType: "JSON"
      }).always(function (jData) {
        // console.log(jData)
        if (jData.status !== 0) {
          deleteDiv.remove();
          aGenre = [];
          aCategory = []; 
          //uncheck checkboxes
          var checkboxes = $('.checkbox').children().find('input');
          $(checkboxes).each(function () {
              $(this).prop('checked', false); // Unchecks it
          })
        // console.log('succes');
          for (x in jData) {
            // console.log(jData[x]);
            var resultDiv = `<li data-name='${jData[x].title}' data-genre='${jData[x].name}' class='list-inline-item archiveItem col-xs-12 col-sm-6 col-md-3 col-lg-3'><a href='videoplayer.php?movieID=${jData[x].id}'><span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left programListColFix programTitle'>${jData[x].title}</span></a></li>`
            $('#archiveContainer').append(resultDiv)
          }
        }
    
      })

 })
