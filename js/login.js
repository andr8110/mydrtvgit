$('.form-signin').submit(function (e) {
  e.preventDefault()

  $.ajax({
    url: "apis/api-login.php",
    method: "POST",
    data: $('.form-signin').serialize(),
    dataType: "JSON"
  }).always(function (jData) {
    console.log(jData)
    if (jData.status === 1) {
      location.href = "/mydrtv/mydrtvgit/index.php"
      return
    }

  })

})