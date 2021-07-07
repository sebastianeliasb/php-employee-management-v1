$(".toForm").on("click", function (e) {
  location.replace("../src/employee.php?id=" + $(e.target).data("id"));
});

$("#returnEmployees").on("click", () => {
  location.replace("../src/dashboard.php");
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
