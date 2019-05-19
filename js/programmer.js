$(document).on("click", "#btnProgramSearch", function () {
    // loop though the archive Items
    $(".archiveItem").each(function () {
        // get the data name of the value 
        var sArchiveItemName = $(this).attr('data-name').toLowerCase()
        // get the value of the input field
        var sSearchFor = $("#programSearch").val().toLowerCase()
        // includes returns true or false
        // does the product name includes something in the input field
        var bMatch = sArchiveItemName.includes(sSearchFor)
        // if there is not a match - hide the products in the screen
        if (!bMatch) {
            $(this).fadeOut(300)
        } else {
            $(this).fadeIn(300)
        }

    })
})