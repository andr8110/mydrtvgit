$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });


  $(".frmSearch").submit(function(e) {
    e.preventDefault();
    console.log('hej')
    var searchResult = $('#txtSearch').val();
    console.log(searchResult);
    location.href = 'search.php?searchName='+ searchResult;
  }); 