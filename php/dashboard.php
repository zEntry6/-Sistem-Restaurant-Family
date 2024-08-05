<?php
require 'koneksi.php';

$query_sql = "SELECT * FROM reservation";
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
                <a href="dashboard.php" class="active">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="reservation.php">
                    <span class="material-symbols-outlined">person_pin</span>
                    <h3>Reservation</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="orders.php">
                    <span class="material-symbols-outlined">orders</span>
                    <h3>Orders</h3>
                </a>
                <a href="transaksi.php">
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
            <h1>Dashbboard</h1>
            <div class="date">
                <input type="date">
            </div>
            <div class="insights">
                <div class="income">
                    <span class="material-symbols-outlined">monitoring</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Reservastion</h3>
                            <h1 id="totalTransaction-1"></h1>
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

                <!-- END OF Reservastion -->
                <div class="expenses">
                    <span class="material-symbols-outlined">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Orders</h3>
                            <h1 id="totalTransaction-2"></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>75%</p>
                            </div>
                        </div>
                        <small class="text-muted">
                            Last 24 hours
                        </small>
                    </div>
                </div>
                <!-- END OF Orders -->
                <div class="income">
                    <span class="material-symbols-outlined">monitoring</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Transaction</h3>
                            <h1 id="totalTransaction-3"></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>31%</p>
                            </div>
                        </div>
                        <small class="text-muted">
                            Last 24 hours
                        </small>
                    </div>
                    <!-- END OF transaction -->
                </div>
            </div>
            <!-- END OF Insights -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Reservation Name</th>
                            <th>Schedule</th>
                            <th>Table</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
// Assuming $result is already defined and holds the query result
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['schedule'] . "</td>";
        echo "<td>" . $row['meja'] . "</td>";
        echo "<td>";

        // Menampilkan status dengan ikon
        if (isset($row['status'])) {
            if ($row['status'] == 'Approved') {
                echo '<i class="fas fa-check"></i>'; // Tanda centang dari Font Awesome
            } elseif ($row['status'] == 'Rejected') {
                echo '<i class="fas fa-times"></i>'; // Tanda silang dari Font Awesome
            } else {
                echo $row['status']; // Tampilkan status lain jika ada
            }
        } else {
            echo 'Pending'; // Default status
        }

        echo "</td>";
        echo "<td>";
        echo '<form action="approve.php" method="post">';
        echo '<input type="hidden" name="id" value="' . (isset($row['id']) ? $row['id'] : '') . '">';
        echo '<select name="status">';

        // Menampilkan option hanya untuk status yang tidak aktif saat ini
        if (!isset($row['status']) || $row['status'] != 'Pending') {
            echo '<option value="Pending">Pending</option>';
        }
        if (!isset($row['status']) || $row['status'] != 'Approved') {
            echo '<option value="Approved">Approved</option>';
        }
        if (!isset($row['status']) || $row['status'] != 'Rejected') {
            echo '<option value="Rejected">Rejected</option>';
        }

        echo '</select>';
        if ($row['status'] == 'Approved') {
            echo '<button type="button" disabled>Confirm</button>';
        } elseif ($row['status'] == 'Rejected') {
            echo '<button type="button" disabled>Rejected</button>';
        } else {
            echo '<button type="submit">Update</button>';
        }
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
                <a href="Reservation.php">Show All</a>
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
            <!-- END OF TOP -->
            <div class="recent-updates">
                <h2>Recent Report</h2>
                <div class="updates">
                    <div class="update">
                        <div class="message">
                            <p><b>Mike Tyson</b> Receiverd his orders of night lion teach</p>
                            <small class="text-muted">2 minute ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="message">
                            <p><b>Mike Tyson</b> Receiverd his orders of night lion teach</p>
                            <small class="text-muted">2 minute ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="message">
                            <p><b>Mike Tyson</b> Receiverd his orders of night lion teach</p>
                            <small class="text-muted">2 minute ago</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END OF RECENT UPDATES -->
            <div class="sales-analytics">
                <h2>Material Food Stock</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-symbols-outlined">inventory</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Meat</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h3>25 Kg</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-symbols-outlined">inventory</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Vegetables</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h3>35 Kg</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-symbols-outlined">inventory</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Wheat</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h3>50 Kg</h3>
                    </div>
                </div>
                <div class="item add-product">
                    <div>
                        <span class="material-symbols-outlined">add</span>
                        <a href="menu.php" id="addProductBtn">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="grafikreservasi.js"></script>
        <script src="grafikorders.js"></script>
        <script src="grafiktransaksi.js"></script>
    </div>
</body>

</html>