<?php
require 'koneksi.php';

$query_sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $query_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="dashboard.css">
    </link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../img/icons8-dashboard-50.png">
                    <h2 class="text-muted">Dashboard</h2>
                </div>

                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="dashboard.php" >
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="reservation.php">
                    <span class="material-symbols-outlined">person_pin</span>
                    <h3>Reservation</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="orders.php" class="active">
                    <span class="material-symbols-outlined">orders</span>
                    <h3>Orders</h3>
                </a>
                <a href="transaksi.php" >
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Transaction</h3>
                </a>
                <a href="menu.php">
                    <span class="material-symbols-outlined">restaurant_menu</span>
                    <h3>Menu Items</h3>
                </a>
                <a href="report.php">
                    <span class="material-symbols-outlined">lab_profile</span>
                    <h3>Report</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- END of aside -->

        <main>
            <h1>Orders</h1>
            <div class="date">
                <input type="date">
            </div>
            <!-- Start OF Order -->
            <div class="insights">
                <div class="income">
                    <span class="material-symbols-outlined">monitoring</span>
                    <div class="middle">
                            <div class="left">
                        <h3>Total Transaction</h3>
                        <h1 id="totalTransaction-2">$0</h1>
                            </div>
                            <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                            <div class="number">
                            <p id="transactionPercentage">0%</p>
                            </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                    </div>
                </div>
            </div>
            <!-- END OF Insights -->
            <div class="recent-orders">
    <h2>Recent Orders</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Nama Makanan</th>
                <th>QTY</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
// Assuming $result is already defined and holds the query result
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_pesanan'] . "</td>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['nama_makanan'] . "</td>";
        echo "<td>" . $row['qty'] . "</td>";
        echo "<td>" . $row['total_harga'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>";

        echo '</form>';
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}
?>

        </tbody>
    </table>
</div>
        </main>
        <!-- END OF MAIN -->

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">wb_sunny</span>
                    <span class="material-symbols-outlined">nightlight</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Zharfan</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../img/profile-photo.png">
                    </div>
                </div>
            </div>           
        </div>
    </div>
    <script src="script.js" ></script>
    <script src="grafikorders.js" ></script>
</body>

</html>