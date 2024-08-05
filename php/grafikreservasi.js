document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost/TUBES_RPL/php/grafikreservasi.php")
      .then((response) => response.json())
      .then((data) => {
        const totalTransaction = data.total;
        document.getElementById(
          "totalTransaction-1"
        ).innerText = `${totalTransaction} Person`;
      })
      .catch((error) => console.error("Error fetching data:", error));
  });
  