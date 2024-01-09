<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/admin.css">
    <title>Hot Offers | Admin</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="../assets/logo-knc.png" alt="Logo">
            <span class="brand-name">Kicks & Chic</span>
        </div>
        <div class="side-menu">
            <a href="./admin-dashboard.php">Dashboard</a>
            <a href="./admin-product.php" class="active">Products</a>
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
            <h1>PRODUCT</h1>
        </div>
        <div class="navigation">
            <input class="searchBar" type="text" id="searchInput" placeholder="Search product...">
            <div class="button-container">
                <a href="./create-product.php"><button class="export"><i class="fas fa-file-export" style="margin-right: 5px;"></i>Export</button></a>
                <a href="./create-product.php"><button class="add-product">ADD PRODUCT</button></a>
            </div>
        </div>
        <div class="product">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <?php if ($i % 5 === 0) : ?>
                    <div class="product-row">
                    <?php endif; ?>

                    <div class="product-view">
                        <img class="" src="../assets/Product-Image/Adidas/samba/samba-og.png" alt="">
                        <h3>Adidas Samba OG Cloud</h3>
                        <p></p>
                        <p><strong>IDR 1.289.000,00</strong></p>
                        <div class="button-container">
                            <button class="edit">Edit</button>
                            <button class="delete">Delete</button>
                        </div>
                    </div>

                    <?php if (($i + 1) % 5 === 0 || $i === 9) : ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </main>
</body>

</html>