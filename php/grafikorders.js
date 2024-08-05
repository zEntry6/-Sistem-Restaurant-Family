document.addEventListener("DOMContentLoaded", function () {
  fetch("http://localhost/TUBES_RPL/php/grafikorders.php")
    .then((response) => response.json())
    .then((data) => {
      const totalTransaction = data.total;
      document.getElementById(
        "totalTransaction-2"
      ).innerText = `${totalTransaction} Person`;
    })
    .catch((error) => console.error("Error fetching data:", error));
});
