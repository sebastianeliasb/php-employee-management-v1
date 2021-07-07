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
