<?php
include './koneksi-admin/koneksi-admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['shoes_name'] ?? '';
    $details = $_POST['details'] ?? '';
    $brand = $_POST['brand_shoes'] ?? '';
    $harga = $_POST['price'] ?? '';

    // Ambil informasi tentang gambar yang diunggah
    $img_1_name = $_FILES['img_1']['name'] ?? '';
    $img_1_tmp = $_FILES['img_1']['tmp_name'] ?? '';
    $img_1_folder = './foto_database/' . $img_1_name; // Ubah path dengan path yang sesuai di server Anda

    $img_2_name = $_FILES['img_2']['name'] ?? '';
    $img_2_tmp = $_FILES['img_2']['tmp_name'] ?? '';
    $img_2_folder = './foto_database/' . $img_2_name; // Ubah path dengan path yang sesuai di server Anda

    $img_3_name = $_FILES['img_3']['name'] ?? '';
    $img_3_tmp = $_FILES['img_3']['tmp_name'] ?? '';
    $img_3_folder = './foto_database/' . $img_3_name; // Ubah path dengan path yang sesuai di server Anda

    $img_4_name = $_FILES['img_4']['name'] ?? '';
    $img_4_tmp = $_FILES['img_4']['tmp_name'] ?? '';
    $img_4_folder = './foto_database/' . $img_4_name; // Ubah path dengan path yang sesuai di server Anda

    $img_5_name = $_FILES['img_5']['name'] ?? '';
    $img_5_tmp = $_FILES['img_5']['tmp_name'] ?? '';
    $img_5_folder = './foto_database/' . $img_5_name; // Ubah path dengan path yang sesuai di server Anda

    // Pindahkan file yang diunggah ke folder tujuan
    move_uploaded_file($img_1_tmp, $img_1_folder);
    move_uploaded_file($img_2_tmp, $img_2_folder);
    move_uploaded_file($img_3_tmp, $img_3_folder);
    move_uploaded_file($img_4_tmp, $img_4_folder);
    move_uploaded_file($img_5_tmp, $img_5_folder);

    // Buat query SQL untuk memasukkan data ke database
    $sql = "INSERT INTO shoes (shoes_name, brand_shoes, details, price, img_1, img_2, img_3, img_4, img_5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Persiapkan pernyataan SQL
    $stmt = $conn->prepare($sql);

    // Bind parameter ke pernyataan SQL
    $stmt->bind_param("sssssssss", $nama, $brand, $details, $harga, $img_1_name, $img_2_name, $img_3_name, $img_4_name, $img_5_name);

    // Eksekusi pernyataan SQL
    if ($stmt->execute()) {
        echo "Data produk berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/admin.css">
    <title>Add Product | Admin</title>
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
            <h1>ADD NEW PRODUCT</h1>
        </div>
        <div class="add-product-form">
            <a href="./admin-product.php"><- BACK</a>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form">
                    <h3>Product Name</h3>
                    <input type="text" name="shoes_name" id="shoes_name"> <!-- Tambahkan atribut "name" yang sesuai -->
                </div>
                <div class="form">
                    <h3>Description</h3>
                    <textarea name="details" id="details" cols="30" rows="10"></textarea> <!-- Tambahkan atribut "name" yang sesuai -->
                </div>
                <div class="form">
                    <h3>Upload Images (Require 5)</h3>
                    <div class="img-container">
                        <div class="img">
                            <input type="file" name="img_1"> <!-- Tambahkan atribut "name" yang sesuai -->
                        </div>
                        <div class="img">
                            <input type="file" name="img_2"> <!-- Tambahkan atribut "name" yang sesuai -->
                        </div>
                        <!-- Tambahkan input file untuk img_3, img_4, dan img_5 dengan atribut "name" yang sesuai -->
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
                    <select class="brandlist" name="brand_shoes" id="brand_shoes"> <!-- Ubah atribut "id" dan "name" menjadi "kategori" -->
                        <option value="Adidas">Adidas</option>
                        <option value="Asics">Asics</option>
                        <option value="Converse">Converse</option>
                        <option value="New Balance">New Balance</option>
                        <option value="Nike">Nike</option>
                        <option value="Onitsuka Tiger">Onitsuka Tiger</option>
                        <option value="Puma">Puma</option>
                        <option value="Reebok">Reebok</option>
                        <option value="Vans">Vans</option>
                    </select>
                </div>
                <div class="form">
                    <h3>Price</h3>
                    <input type="text" name="price" id="price"> <!-- Tambahkan atribut "name" yang sesuai -->
                </div>

                <a href="./admin-dashboard.php"><button type="submit" class="btn btn-primary" name="add_product">Add Product</button></a>
            </form>

        </div>
    </main>
</body>

</html>