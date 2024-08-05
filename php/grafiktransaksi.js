document.addEventListener("DOMContentLoaded", function () {
  function fetchTotalTransactions() {
    fetch("grafiktransaksi.php")
      .then((response) => response.json())
      .then((data) => {
        document.getElementById(
          "totalTransaction-3"
        ).innerText = `RP ${data.total}`;
        // Update the percentage if you have a specific logic for it
        document.getElementById("transactionPercentage").innerText = `${
          (data.total / 100000) * 100
        }%`; // Example calculation
      })
      .catch((error) =>
        console.error("Error fetching transaction data:", error)
      );
  }

  // Fetch data every 5 seconds
  setInterval(fetchTotalTransactions, 5000);
  fetchTotalTransactions(); // Initial fetch
});
