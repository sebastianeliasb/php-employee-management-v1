const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

$("body").on("click", ".new-employee", function () {
  $(".info-row").append(
    "<tr><td><input type='text' name='name' id='name'></td><td><input type='text' name='lastName' id='lastName'></td><td><input type='number' name='age' id='age'></td><td><input type='text' name='email' id='email'></td><td><input type='number' name='phoneNumber' id='phoneNumber'></td><td><button type='submit' name='new_submit' >+</tr>"
  );
});

$("body").on("submit", "#new-employee-form", function (e) {
  const postData = {
    id: $("tr").length - 1,
    name: $("#name").val(),
    lastName: $("#lastName").val(),
    email: $("#email").val(),
    gender: "",
    age: $("#age").val(),
    streetAddress: "",
    city: "",
    state: "",
    postalCode: "",
    phoneNumber: $("#phoneNumber").val(),
  };

  $.post(
    "../src/library/employeeController.php",
    postData,
    function (response) {
      console.log("response");
    }
  );
  e.preventDefault();
  let employeesRequest = $.ajax({
    type: "GET",
    url: "./dashboard.php",
  });

  employeesRequest.done(function (data, status) {
    $("tbody").html($(data).find("tbody").html());
  });
});

$("body").on("click", ".toForm", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
});
