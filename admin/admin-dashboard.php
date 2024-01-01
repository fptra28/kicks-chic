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
            <a href="/admin/admin-dashboard.php" class="active">Dashboard</a>
            <a href="/product">Products</a>
            <a href="/orders">Orders</a>
            <a href="/reviews">Reviews</a>
            <a href="/transactions">Transaction</a>
            <a href="/hot-offers">Hot Offers</a>
        </div>
        <div class="account">
            <div class="profile">
                <i class='bx bxs-user'></i>
            </div>
            <a href="/logout" class="logout">
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
                    <div class="text-wrapper-2">30 Product</div>
                </div>
            </div>
        </div>
        <div class="latest-order">
            
        </div>
    </main>
</body>

</html>