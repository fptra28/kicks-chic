<?php
include './koneksi-admin/koneksi-admin.php';

$sql = "SELECT COUNT(*) as total_records FROM shoes";

// Menjalankan query
$result = $conn->query($sql);
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
                    <div class="data">Rp. 1.523.644.000</div>
                </div>
            </div>
            <div class="report">
                <img class="logo-total" src="../assets/lg-total-orders.png" alt="logo-orders" />
                <div class="content">
                    <div class="text-wrapper">Total Orders</div>
                    <div class="data">2809</div>
                </div>
            </div>
            <div class="report">
                <img class="logo-total" src="../assets/lg-total-product.png" alt="logo-product" />
                <div class="content">
                    <div class="text-wrapper">Total Product</div>
                    <div class="data">
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total_records"];
                    } else {
                        echo "Tidak ada record dalam tabel.";
                    }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="latest-order">
            <div class="subtitle">
                Latest Orders
            </div>
            <table>
                <tr>
                    <td>2809</td>
                    <td class="cus-name">Muhammad Faturrahman Putra</td>
                    <td>087778376988</td>
                    <td>IDR 5.588.000</td>
                    <td>
                        <div class="delivered">DELIVERED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2808</td>
                    <td class="cus-name">Nasyifa Choirunisa</td>
                    <td>082012802080</td>
                    <td>IDR 1.588.000</td>
                    <td>
                        <div class="pending">PENDING</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2807</td>
                    <td class="cus-name">Diego Oliver Hernanto</td>
                    <td>082218388332</td>
                    <td>Rp. 3.588.000</td>
                    <td>
                        <div class="delivered">DELIVERED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2806</td>
                    <td class="cus-name">Annurrafiq Martasi</td>
                    <td>089821389231</td>
                    <td>Rp. 1.200.000</td>
                    <td>
                        <div class="cancel">CANCELED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2805</td>
                    <td class="cus-name">Muhammad Daffa Fachreza</td>
                    <td>082145235352</td>
                    <td>Rp. 1.336.000</td>
                    <td>
                        <div class="arrive">ARRIVED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2804</td>
                    <td class="cus-name">Ferdy Thursyandi Ontoseno</td>
                    <td>086627712131</td>
                    <td>Rp. 2.100.000</td>
                    <td>
                        <div class="arrive">ARRIVED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
                <tr>
                    <td>2803</td>
                    <td class="cus-name">Azhar Damarhadi</td>
                    <td>081233544543</td>
                    <td>Rp. 4.988.000</td>
                    <td>
                        <div class="delivered">DELIVERED</div>
                    </td>
                    <td><img class="more-info" src="../assets/three-dots.svg" alt="more-info"></td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>