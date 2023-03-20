//document.getElementById("email").innerHTML = sessionStorage.getItem("email");

//ajax
console.info(sessionStorage.getItem("email"));
$.ajax({
  type: "POST",
  url: "php/profile.php",
  data: { email: sessionStorage.getItem("email") },
  dataType: "json",
  encode: true,
}).done(function (data) {
  if (data.success == true) {
    //alert(data);
    document.getElementById("name").innerHTML = data.name;
    document.getElementById("email").innerHTML = data.email;
    document.getElementById("age").innerHTML = data.age;
    document.getElementById("dob").innerHTML = data.dob;
    document.getElementById("num").innerHTML = data.num;
  } else {
    //document.getElementById("name").innerHTML = data["name"];
    //alert(data);
    alert(data.error);
  }
});

// var xhttp = new XMLHttpRequest();
// xhttp.onreadystatechange = function () {
//   if (this.readyState == 4 && this.status == 200) {
//     // Add the HTML table to the webpage
//     document.getElementById("table-container").innerHTML = this.responseText;
//   }
// };

// xhttp.open("GET", "fetch_data.php", true);
// xhttp.send();
