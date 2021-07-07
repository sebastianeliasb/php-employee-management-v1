const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

$(addNewEmployee).on("click", function () {
  infoRow.append(
    "<tr><td><input type='text' name='name' id='name'></td><td><input type='text' name='lastName' id='lastName'></td><td><input type='number' name='age' id='age'></td><td><input type='text' name='email' id='email'></td><td><input type='number' name='phoneNumber' id='phoneNumber'></td><td><button type='submit' name='new_submit' >+</tr>"
  );
});

$("#new-employee-form").submit(function (e) {
  const postData = {
    id: "",
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
      $("#new-employee-form").trigger("reset");
    }
  );
  e.preventDefault();
  // employeeInfo.load(employeeInfo);
});

$.ajax({
  url: "../src/library/employeeController.php",
  type: "GET",
  success: function (response) {
    console.log(response);
  },
});
