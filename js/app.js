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

  $(document).on('click', '.profileButton', function () {
    if (!$("#wrapper").hasClass("toggled")) {
      $("#wrapper #sidebar-wrapper").css("width", "20vw");
    
    } else {
      $("#wrapper #sidebar-wrapper").css("width", "0px");  
    }
  })