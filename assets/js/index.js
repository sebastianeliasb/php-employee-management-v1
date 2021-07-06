const infoRow = $(".info-row");
const addNewEmployee = $(".new-employee");
const employeeInfo = $(".employee-info");

$(addNewEmployee).on("click", function () {
  infoRow.append(
    "<tr><td><input></td><td><input></td><td><input></td><td><input></td><td><input></td><td><input type='submit' value='+'></tr>"
  );
});
