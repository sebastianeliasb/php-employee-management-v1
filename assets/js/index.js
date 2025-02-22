/** @format */

const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

// Header dynamic format
let path = $(location).attr("pathname").split("/");
path = path[path.length - 1];
$(function () {
  if (path == "dashboard.php") {
    $("#navDashboard").addClass("active");
    $("#navDashboard").html("Dashboard<span class='sr-only'>(current)</span>");
  } else {
    $("#navEmployee").addClass("active");
    $("#navEmployee").html("Employee<span class='sr-only'>(current)</span>");
  }
});

// List -> New employee -> Show input fields
$("body").on("click", ".new-employee", function () {
  if ($("input").length <= 0) {
    $(".info-row").append(
      "<tr><td><input type='text' name='name' id='name' required></td><td><input type='text' name='lastName' id='lastName' required></td><td><input type='number' name='age' id='age' required></td><td><input type='text' name='email' id='email' required></td><td><input type='number' name='phoneNumber' id='phoneNumber' required></td><td class='btn_td'><input type='submit' class='new_submit' name='new_submit' id='new_submit' value='+' ></tr>"
    );
  }
});

// List -> New employee -> Submit
$("body").on("click", "#new_submit", function (e) {
  const inputArr = ["#name", "#lastName", "#age", "#email", "#phoneNumber"];
  let empty = 0;
  inputArr.forEach(function (input) {
    if ($(input).val() != false) {
      empty += 1;
    }
  });

  if (empty == 5) {
    const postData = {
      id: Math.floor(Math.random() * 26) + Date.now(),
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
      function (response) {}
    );
    e.preventDefault();
    let employeesRequest = $.ajax({
      type: "GET",
      url: "./dashboard.php",
    });

    employeesRequest.done(function (data, status) {
      $("tbody").html($(data).find("tbody").html());
    });
  } else {
    swal(
      "There are empty fields!",
      "Please fill all the employee data",
      "warning"
    );
  }
});

// List -> Editing employee -> Show inputs and their values
$("body").on("click", ".modifyList", function (e) {
  const id = $(e.target).data("id");
  let parentRow = $(e.target).parent().parent();
  let newContent =
    "<td><input name='editingName' id='editingName' type='text required'></td> <td><input name='editingLastName' id='editingLastName' type='text' required></td><td><input name='editingAge' id='editingAge' type='text' required></td><td><input name='editingEmail' id='editingEmail' type='text' required></td><td><input name='editingPhoneNumber' id='editingPhoneNumber' type='text' required></td><td class='btn_td'><input class='new_submit' type='submit' id='editSubmit' name='editSubmit' data-id='" +
    id +
    "' value='+'></td>";

  if ($("input").length <= 0) {
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
  }
});

// List -> Editing employees -> Submit
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

// List -> Delete employee
$("body").on("click", ".delete-employee", function (e) {
  var row_id = $(e.target).parent().data("id");
  $(e.target).closest(".row-employee-data").remove();

  $.ajax({
    type: "DELETE",
    url: "../src/library/employeeController.php?row_id=" + row_id,
    async: true,
    success: function (data) {
      swal("Task made!", "This employee has been eliminated!", "success");
    },
    error: function () {
      swal(
        "Ups! Something went wrong!",
        "Contact with the page administrator.",
        "warning"
      );
    },
  });
});

// List -> Open employee on form
$("body").on("dblclick", ".toForm", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

// Form -> Return to dashboard
$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
});

// Log out timer
function checkUserTime() {
  $.ajax({
    url: "../src/library/loginController.php",
    method: "post",
    success: function (response) {
      if (response == "Logout") {
        window.location.href = "../src/library/sessionHelper.php";
      }
    },
  });
}
setInterval(function () {
  checkUserTime();
}, 10000);
