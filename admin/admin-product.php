<?php
include './koneksi-admin/koneksi-admin.php';

$sql = "SELECT * FROM shoes";
$result = $conn->query($sql);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $product_id = $_GET['id'];

    if ($action == 'edit') {
        header("Location: edit-product.php?id=$product_id");
        exit();
    } elseif ($action == 'delete') {
        include './koneksi-admin/koneksi-admin.php';
        $delete_sql = "DELETE FROM shoes WHERE shoes_name = $product_id";

        if ($conn->query($delete_sql) === TRUE) {
            echo "Produk berhasil dihapus";
        } else {
            echo "Error: " . $delete_sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $delete_product = $conn->prepare("DELETE FROM shoes WHERE shoes_name = ?");
    $delete_product->bind_param('s', $delete_id);
    $delete_product->execute();

    if ($delete_product->affected_rows > 0) {
        echo "Produk berhasil dihapus";
    } else {
        echo "Error: Gagal menghapus produk";
    }

    $delete_product->close();
    header('location:admin-product.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/admin.css">
    <title>Product | Admin</title>
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
                <a href=""><button class="export"><i class="fas fa-file-export" style="margin-right: 5px;"></i>Export</button></a>
                <a href="./add-product.php"><button class="add-product">ADD PRODUCT</button></a>
            </div>
        </div>
        <div class="product">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $productName = $row['shoes_name'];
                    $price = $row['price'];
                    $imagePath = './foto_database/' . $row['img_1'];
            ?>
                    <div class="product-view">
                        <img class="" src="<?php echo $imagePath; ?>" alt="">
                        <h3><?php echo $productName; ?></h3>
                        <div class="bawah">
                            <p><strong>IDR <?php echo $price; ?>,00</strong></p>
                            <div class="button-container">
                                <button class="edit">Edit</button>
                                <a href="admin-product.php?delete=<?php echo $row['shoes_name']; ?>"><button class="delete" id="delete">Delete</button></a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Tidak ada data yang ditemukan";
            }
            ?>
        </div>
    </main>
</body>

</html>