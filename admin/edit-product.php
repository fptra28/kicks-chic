<?php
include './koneksi-admin/koneksi-admin.php';

$product_id = $_GET['id'] ?? '';

$row = [];

$sql = "SELECT * FROM shoes WHERE shoes_name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data produk tidak ditemukan";
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['shoes_name'] ?? '';
    $details = $_POST['details'] ?? '';
    $brand = $_POST['brand_shoes'] ?? '';
    $harga = $_POST['price'] ?? '';

    $img_1_name = $_FILES['img_1']['name'] ?? '';
    $img_1_tmp = $_FILES['img_1']['tmp_name'] ?? '';
    $img_1_folder = './foto_database/' . $img_1_name;

    $img_2_name = $_FILES['img_2']['name'] ?? '';
    $img_2_tmp = $_FILES['img_2']['tmp_name'] ?? '';
    $img_2_folder = './foto_database/' . $img_2_name;

    $img_3_name = $_FILES['img_3']['name'] ?? '';
    $img_3_tmp = $_FILES['img_3']['tmp_name'] ?? '';
    $img_3_folder = './foto_database/' . $img_3_name;

    $img_4_name = $_FILES['img_4']['name'] ?? '';
    $img_4_tmp = $_FILES['img_4']['tmp_name'] ?? '';
    $img_4_folder = './foto_database/' . $img_4_name;

    $img_5_name = $_FILES['img_5']['name'] ?? '';
    $img_5_tmp = $_FILES['img_5']['tmp_name'] ?? '';
    $img_5_folder = './foto_database/' . $img_5_name;

    move_uploaded_file($img_1_tmp, $img_1_folder);
    move_uploaded_file($img_2_tmp, $img_2_folder);
    move_uploaded_file($img_3_tmp, $img_3_folder);
    move_uploaded_file($img_4_tmp, $img_4_folder);
    move_uploaded_file($img_5_tmp, $img_5_folder);

    $sql = "UPDATE shoes SET shoes_name=?, brand_shoes=?, details=?, price=?, img_1=?, img_2=?, img_3=?, img_4=?, img_5=? WHERE shoes_name=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssssssss", $nama, $brand, $details, $harga, $img_1_name, $img_2_name, $img_3_name, $img_4_name, $img_5_name, $product_id);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">';
        echo 'alert("Data produk berhasil diupdate.");';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/admin.css">
    <title>Edit Product | Admin</title>
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
            <h1>EDIT PRODUCT</h1>
        </div>
        <div class="add-product-form">
            <a href="./admin-product.php"><- BACK</a>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <h3>Product Name</h3>
                            <input type="text" name="shoes_name" id="shoes_name" value="<?php echo $row['shoes_name']; ?>">
                        </div>
                        <div class="form">
                            <h3>Description</h3>
                            <textarea name="details" id="details" cols="30" rows="10"><?php echo isset($row['details']) ? $row['details'] : ''; ?></textarea>
                        </div>
                        <div class="form">
                            <h3>Upload Images (Require 5)</h3>
                            <div class="img-container">
                                <div class="img">
                                    <input type="file" name="img_1">
                                </div>
                                <div class="img">
                                    <input type="file" name="img_2">
                                </div>
                                <div class="img">
                                    <input type="file" name="img_3">
                                </div>
                                <div class="img">
                                    <input type="file" name="img_4">
                                </div>
                                <div class="img">
                                    <input type="file" name="img_5">
                                </div>
                            </div>
                        </div>
                        <div class="form">
                            <h3>Brand</h3>
                            <select class="brandlist" name="brand_shoes" id="brand_shoes">
                                <option value="Adidas" <?php echo ($row['brand_shoes'] == 'Adidas') ? 'selected' : ''; ?>>Adidas</option>
                                <option value="Asics" <?php echo ($row['brand_shoes'] == 'Asics') ? 'selected' : ''; ?>>Asics</option>
                                <option value="Converse" <?php echo ($row['brand_shoes'] == 'Converse') ? 'selected' : ''; ?>>Converse</option>
                                <option value="New Balance" <?php echo ($row['brand_shoes'] == 'New Balance') ? 'selected' : ''; ?>>New Balance</option>
                                <option value="Nike" <?php echo ($row['brand_shoes'] == 'Nike') ? 'selected' : ''; ?>>Nike</option>
                                <option value="Onitsuka Tiger" <?php echo ($row['brand_shoes'] == 'Onitsuka Tiger') ? 'selected' : ''; ?>>Onitsuka Tiger</option>
                                <option value="Puma" <?php echo ($row['brand_shoes'] == 'Puma') ? 'selected' : ''; ?>>Puma</option>
                                <option value="Reebok" <?php echo ($row['brand_shoes'] == 'Reebok') ? 'selected' : ''; ?>>Reebok</option>
                                <option value="Vans" <?php echo ($row['brand_shoes'] == 'Vans') ? 'selected' : ''; ?>>Vans</option>
                            </select>
                        </div>
                        <div class="form">
                            <h3>Price</h3>
                            <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary" name="edit_product">Save Changes</button>
                    </form>
        </div>
    </main>
</body>

</html>