$(".toForm").on("click", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});
const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

$("body").on("click", ".new-employee", function () {
  $(".info-row").append(
    "<tr><td><input type='text' name='name' id='name' required></td><td><input type='text' name='lastName' id='lastName' required></td><td><input type='number' name='age' id='age' required></td><td><input type='text' name='email' id='email' required></td><td><input type='number' name='phoneNumber' id='phoneNumber' required></td><td><button type='submit' name='new_submit' >+</tr>"
  );
});

$(".modifyList").on("click", function (e) {
  const id = $(e.target).data("id");
  let parentRow = $(e.target).parent();
  let newContent =
    "<td class='toForm'><input name='name' id='name' type='text'></td> <td class='toForm' ><input name='lastName' id='lastName' type='text'></td><td class='toForm' ><input name='age' id='age' type='text'></td><td class='toForm' ><input name='email' id='email' type='text'></td><td class='toForm' ><input name='phoneNumber' id='phoneNumber' type='text'></td><td class='modifyList btn'>Modify</td>";

  parentRow.html(newContent);
  let employeesRequest = $.ajax({
    type: "GET",
    url: "../resources/employees.json",
  });

  employeesRequest.done(function (data, status) {
    console.log(data);
    const filteredData = data.filter(function (employee) {
      console.log("ei " + employee);
      if (employee == id) {
      }
    });

    $("#name.value").value = filteredData["name"];
    console.log(filteredData);

    console.log(status);
  });
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
      console.log(response);
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

/* $(function () {

$("body").on("click", ".toForm", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
});
*/
