const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

// Inputs for the new employee on list form
$("body").on("click", ".new-employee", function () {
  $(".info-row").append(
    "<tr><td><input type='text' name='name' id='name' required></td><td><input type='text' name='lastName' id='lastName' required></td><td><input type='number' name='age' id='age' required></td><td><input type='text' name='email' id='email' required></td><td><input type='number' name='phoneNumber' id='phoneNumber' required></td><td><button type='submit' name='new_submit' id='new_submit' >+</tr>"
  );
});

// New employee on list submit
$("body").on("click", "#new_submit", function (e) {
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

// Inputs and their values for editing list item
$("body").on("click", ".modifyList", function (e) {
  const id = $(e.target).data("id");
  let parentRow = $(e.target).parent();
  let newContent =
    "<td><input name='editingName' id='editingName' type='text required'></td> <td><input name='editingLastName' id='editingLastName' type='text' required></td><td><input name='editingAge' id='editingAge' type='text' required></td><td><input name='editingEmail' id='editingEmail' type='text' required></td><td><input name='editingPhoneNumber' id='editingPhoneNumber' type='text' required></td><td><input type='submit' id='editSubmit' name='editSubmit' data-id='" +
    id +
    "' value='Accept'></td>";

  parentRow.html(newContent);
  let employeesRequest = $.ajax({
    type: "GET",
    url: "../resources/employees.json",
  });

  employeesRequest.done(function (data, status) {
    const filteredData = data.filter(function (employee) {
      if (employee["id"] == id) {
        return employee;
      }
    });

    $("#editingName").val(filteredData[0]["name"]);
    $("#editingLastName").val(filteredData[0]["lastName"]);
    $("#editingAge").val(filteredData[0]["age"]);
    $("#editingEmail").val(filteredData[0]["email"]);
    $("#editingPhoneNumber").val(filteredData[0]["phoneNumber"]);
  });
});

// Editing list item submit
$("body").on("click", "#editSubmit", function (e) {
  let employeesRequest = $.ajax({
    type: "GET",
    url: "../resources/employees.json",
  });

  e.preventDefault();

  $employeeDB = employeesRequest.done(function (data, status) {
    const filteredData = data.filter(function (employee) {
      if (employee["id"] == $(e.target).data("id")) {
        return employee;
      }
    });
  });

  const employeeData = {
    id: $(e.target).data("id"),
    name: $("#editingName").val(),
    lastName: $("#editingLastName").val(),
    email: $("#editingEmail").val(),
    gender: $employeeDB["gender"],
    age: $("#editingAge").val(),
    streetAddress: $employeeDB["streeetAddress"],
    city: $employeeDB["city"],
    state: $employeeDB["state"],
    postalCode: $employeeDB["postalCode"],
    phoneNumber: $("#editingPhoneNumber").val(),
  };

  let employeesEdit = $.ajax({
    type: "PUT",
    url: "../src/library/employeeController.php",
    contentType: "application/json",
    dataType: "text",
    data: JSON.stringify(employeeData),
  });

  /* e.preventDefault(); */

  employeesEdit.done(function (daata, status) {
    let employeesRequest = $.ajax({
      type: "GET",
      url: "./dashboard.php",
    });

    employeesRequest.done(function (data, status) {
      $("tbody").html($(data).find("tbody").html());
    });
  });
});

$("body").on("click", ".toForm", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
});
