const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

// $(addNewEmployee).on("click", function () {
//   infoRow.append(
//     "<tr><td><input type='text' name='name' id='name'></td><td><input type='text' name='lastName' id='lastName'></td><td><input type='number' name='age' id='age'></td><td><input type='text' name='email' id='email'></td><td><input type='number' name='phoneNumber' id='phoneNumber'></td><td><button type='submit' name='new_submit' >+</tr>"
//   );
// });

addNewEmployee.on("click", addNewEmployeeFunc);

function addNewEmployeeFunc() {
  $(".info-row").append(
    "<tr><td><input type='text' name='name' id='name'></td><td><input type='text' name='lastName' id='lastName'></td><td><input type='number' name='age' id='age'></td><td><input type='text' name='email' id='email'></td><td><input type='number' name='phoneNumber' id='phoneNumber'></td><td><button type='submit' name='new_submit' >+</tr>"
  );
  // $(addNewEmployee).off("click", $(".info-row"), addNewEmployeeFunc);
}

infoRow.on("load", function () {
  addNewEmployee.on("click", addNewEmployeeFunc);
});

$("#new-employee-form").submit(function (e) {
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
  infoRow.load("../src/dashboard.php .info-row");
});
$("td").on("click", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
});

/* $(function () {
  let employeesRequest = $.ajax({
    type: "GET",
    url: "../resources/employees.json",
  });

  employeesRequest.done(function (data, status) {
    console.log(data);
    console.log(status);
  });
}); */
