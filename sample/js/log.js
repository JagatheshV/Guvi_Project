function loginUser() {
  var formData = $("#login_form").serialize();

  $.ajax({
    type: "POST",
    url: "php/log.php",
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    console.log(data);
    if (data.success) {
      sessionStorage.setItem("email", data.email);
      //sessionStorage.setItem("name", data.name);

      window.location.assign("profile1.html");
      alert("Login successful!");
    } else {
      alert(data.error);
    }
  });
}

$(document).ready(function () {
  $("#login_form").submit(function (event) {
    event.preventDefault();
    loginUser();
  });
});
