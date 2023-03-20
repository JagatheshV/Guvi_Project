function registerUser() {
  var formData = $("#register-form").serialize();

  $.ajax({
    type: "POST",
    url: "php/register.php",
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    console.log(data);
    if (data.success) {
      window.location.assign("log1.html");
      alert("register successful!");
    } else {
      alert(data.error);
    }
  });
}

$(document).ready(function () {
  $("#register-form").submit(function (event) {
    event.preventDefault();
    registerUser();
  });
});
