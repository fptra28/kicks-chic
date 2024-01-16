<?php
include './koneksi-admin/koneksi-admin.php';

$sqlTotalRecords = "SELECT COUNT(*) as total_records FROM shoes";
$sqlTotalOrders = "SELECT COUNT(*) as totalOrders FROM orders";
$sqlTotalSales = "SELECT SUM(order_price) AS total_sales FROM orders";
$sqlLatestOrders = "SELECT * FROM orders ORDER BY id_orders DESC LIMIT 10";


$resultTotalRecords = $conn->query($sqlTotalRecords);
$resultTotalOrders= $conn->query($sqlTotalOrders);
$resultTotalSales= $conn->query($sqlTotalSales);
$resultLatestOrders = $conn->query($sqlLatestOrders);

function formatRupiah($price) {
    return "IDR " . number_format($price, 0, ',', '.') . ",00";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/styles/admin.css">
    <title>Home | Admin</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="../assets/logo-knc.png" alt="Logo">
            <span class="brand-name">Kicks & Chic</span>
        </div>
        <div class="side-menu">
            <a href="./admin-dashboard.php" class="active">Dashboard</a>
            <a href="./admin-product.php">Products</a>
            <a href="./admin-orders.php">Orders</a>
            <a href="./admin-reviews.php">Reviews</a>
            <a href="./admin-transactions.php">Transaction</a>
            <a href="./admin-hot-offers.php">Hot Offers</a>
        </div>
        <div class="account">
            <div class="profile">
                <i class='bx bxs-user'></i>
            </div>
            <a href="./admin-login.php" class="logout">
                LOGOUT
            </a>
        </div>
    </div>
    <main>
        <div class="title">
            <h1>DASHBOARD</h1>
        </div>
        <div class="total">
            <div class="report">
                <img class="logo-total" src="../assets/lg-total-sales.png" alt="logo-sales" />
                <div class="content">
                    <div class="text-wrapper">Total Sales</div>
                    <div class="data">
                        <?php
                        if ($resultTotalSales) {
                            $rowTotalSales = $resultTotalSales->fetch_assoc();
                            echo "<p style='margin: 0px;'><strong>" . formatRupiah($rowTotalSales["total_sales"]) . "</strong></p>";
                        } else {
                            echo "Tidak ada record dalam tabel.";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="report">
                <img class="logo-total" src="../assets/lg-total-orders.png" alt="logo-orders" />
                <div class="content">
                    <div class="text-wrapper">Total Orders</div>
                    <div class="data">
                        <?php
                        if ($resultTotalOrders) {
                            $rowTotalOrders = $resultTotalOrders->fetch_assoc();
                            echo $rowTotalOrders["totalOrders"];
                        } else {
                            echo "Tidak ada record dalam tabel.";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="report">
                <img class="logo-total" src="../assets/lg-total-product.png" alt="logo-product" />
                <div class="content">
                    <div class="text-wrapper">Total Product</div>
                    <div class="data">
                        <?php
                        if ($resultTotalRecords) {
                            $rowTotalRecords = $resultTotalRecords->fetch_assoc();
                            echo $rowTotalRecords["total_records"];
                        } else {
                            echo "Tidak ada record dalam tabel.";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="latest-order">
            <div class="subtitle">
                Latest Orders
            </div>
            <table>
                <?php
                while ($rowLatestOrders = $resultLatestOrders->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rowLatestOrders["id_orders"] . "</td>";
                    echo "<td class='cus-name'>" . $rowLatestOrders["name"] . "</td>";
                    echo "<td>" . $rowLatestOrders["phone"] . "</td>";
                    echo "<td>Rp. " . number_format($rowLatestOrders["order_price"], 0, ',', '.') . ",00</td>";
                    echo "<td class='" . $rowLatestOrders["status"] . "'>" . $rowLatestOrders["status"] . "</td>";
                    echo "<td><img class='more-info' src='../assets/three-dots.svg' alt='more-info'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>

</html>