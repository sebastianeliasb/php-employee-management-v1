const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

$(addNewEmployee).on("click", function () {
  infoRow.append(
    "<tr><form method='POST'><td><input type='text' name='name'></td><td><input type='text' name='lastName'></td><td><input type='number' name='age'></td><td><input type='text' name='email'></td><td><input type='number' name='phoneNumber'></td><td><button type='submit' >+</form></tr>"
  );
});
