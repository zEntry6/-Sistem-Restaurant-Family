<?php
require 'koneksi.php';
require 'popupadd.php';

$query_sql = "SELECT * FROM daftar_menu";
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
    <style>
        
/* Pop-up styles */
.popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.popup-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

</style>
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
                <a href="orders.php">
                    <span class="material-symbols-outlined">orders</span>
                    <h3>Orders</h3>
                </a>
                <a href="transaksi.php" >
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Transaction</h3>
                </a>
                <a href="menu.php" class="active">
                    <span class="material-symbols-outlined">restaurant_menu</span>
                    <h3>Menu Items</h3>
                </a>
                <a href="report.php" >
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
            <h1>Menu Items</h1>
            <div class="date">
                <input type="date">
            </div>
            
            <!-- END OF Insights -->
            <div class="recent-orders">
    <h2>Menu items</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Makanan</th>
                <th>Stock</th>
                <th>Price</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
// Assuming $result is already defined and holds the query result
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama_makanan'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>";

        
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
            <!-- END OF TOP -->
            
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
                <a href="#menu" id="addProductBtn">Add Product</a>
                </div>
            </div>
            <!-- Pop-up for adding new product -->
            <div id="addProductPopup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Add New Product</h2>
                <form id="addProductForm" action="popupadd.php" method="POST">
                    <label for="nama_makanan">Nama Makanan</label>
                    <input type="text" id="nama_makanan" name="nama_makanan" required>
                    <label for="productStock">Stock:</label>
                    <input type="text" id="productStock" name="productStock" required>
                    <label for="productPrice">Price:</label>
                    <input type="text" id="productPrice" name="productPrice" required>
                    <button type="submit">Add Product</button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
    <script src="script.js" ></script>
    <script src="popupadd.js" ></script>
</body>

</html>