<?php
include './koneksi-admin/koneksi-admin.php';

$fetch_profile = [];

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
}

if (isset($_POST['add_product'])) {
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $harga = filter_input(INPUT_POST, 'harga', FILTER_SANITIZE_STRING);
    $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
    $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

    $img_1 = $_FILES['img_1']['name'];
    $img_1_size = $_FILES['img_1']['size'];
    $img_1_tmp_name = $_FILES['img_1']['tmp_name'];
    $img_1_folder = '../uploaded_files/' . $img_1;

    $img_2 = $_FILES['img_2']['name'];
    $img_2_size = $_FILES['img_2']['size'];
    $img_2_tmp_name = $_FILES['img_2']['tmp_name'];
    $img_2_folder = '../uploaded_files/' . $img_2;

    $img_3 = $_FILES['img_3']['name'];
    $img_3_size = $_FILES['img_3']['size'];
    $img_3_tmp_name = $_FILES['img_3']['tmp_name'];
    $img_3_folder = '../uploaded_files/' . $img_3;

    $img_4 = $_FILES['img_4']['name'];
    $img_4_size = $_FILES['img_4']['size'];
    $img_4_tmp_name = $_FILES['img_4']['tmp_name'];
    $img_4_folder = '../uploaded_files/' . $img_4;

    $img_5 = $_FILES['img_5']['name'];
    $img_5_size = $_FILES['img_5']['size'];
    $img_5_tmp_name = $_FILES['img_5']['tmp_name'];
    $img_5_folder = '../uploaded_files/' . $img_5;

    $select_products = $koneksi->prepare("SELECT * FROM products WHERE nama = ?");
    $select_products->bind_param('s', $nama);
    $select_products->execute();
    $select_products->store_result();

    if ($select_products->num_rows > 0) {
        $message = "Nama produk sudah ada!";
    } else {
        if ($img_1_size > 2000000 || $img_2_size > 2000000 || $img_3_size > 2000000) {
            $message = "Ukuran gambar terlalu besar";
        } else {
            move_uploaded_file($img_1_tmp_name, $img_1_folder);
            move_uploaded_file($img_2_tmp_name, $img_2_folder);
            move_uploaded_file($img_3_tmp_name, $img_3_folder);

            $insert_product = $koneksi->prepare("INSERT INTO products(nama, details, harga, kategori, img_1, img_2, img_3, img_4, img_5) VALUES (?,?,?,?,?,?,?)");
            $insert_product->bind_param('sssssss', $nama, $details, $harga, $kategori, $img_1, $img_2, $img_3, $img_4, $img_5);
            $insert_product->execute();

            $message = "Yeay... Produk berhasil ditambahkan!";
        }
    }
    header("Location: products.php");
    exit();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_product_image = $koneksi->prepare("SELECT * FROM products WHERE id = ?");
    $delete_product_image->bind_param('i', $delete_id);
    $delete_product_image->execute();
    $result = $delete_product_image->get_result();
    if ($result->num_rows > 0) {
        $fetch_delete_image = $result->fetch_assoc();
        unlink('../uploaded_files/' . $fetch_delete_image['img_11']);
        unlink('../uploaded_files/' . $fetch_delete_image['img_2']);
        unlink('../uploaded_files/' . $fetch_delete_image['img_3']);
        $delete_product = $koneksi->prepare("DELETE FROM products WHERE id = ?");
        $delete_product->bind_param('i', $delete_id);
        $delete_product->execute();
        $delete_cart = $koneksi->prepare("DELETE FROM cart WHERE product_id = ?");
        $delete_cart->bind_param('i', $delete_id);
        $delete_cart->execute();
        $delete_wishlist = $koneksi->prepare("DELETE FROM wishlist WHERE product_id = ?");
        $delete_wishlist->bind_param('i', $delete_id);
        $delete_wishlist->execute();
    }
    header('location:products.php');
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
            <a href="/logout" class="logout">
                LOGOUT
            </a>
        </div>
    </div>
    <main>
        <div class="title">
            <h1>ADD NEW PRODUCT</h1>
        </div>
        <div class="add-product-form">
            <div class="form">
                <h3>Product Name</h3>
                <input type="text" name="" id="">
            </div>
            <div class="form">
                <h3>Description</h3>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form">
                <h3>Upload Images (Require 5)</h3>
                <div class="img-container">
                    <div class="img">
                        <input type="file">
                    </div>
                    <div class="img">
                        <input type="file">
                    </div>
                    <div class="img">
                        <input type="file">
                    </div>
                    <div class="img">
                        <input type="file">
                    </div>
                    <div class="img">
                        <input type="file">
                    </div>
                </div>
            </div>
            <div class="form">
                <h3>Brand</h3>
                <select class="brandlist" name="Brand" id="brand">
                    <option value="Adidas">Adidas</option>
                    <option value="Adidas">Asics</option>
                    <option value="Adidas">Converse</option>
                    <option value="Adidas">New Balance</option>
                    <option value="Adidas">Nike</option>
                    <option value="Adidas">Onitsuka Tiger</option>
                    <option value="Adidas">Puma</option>
                    <option value="Adidas">Reebok</option>
                    <option value="Adidas">Vans</option>
                </select>
            </div>
            <div class="form">
                <h3>Price</h3>
                <input type="text" name="" id="">
            </div>

            <button type="submit" onclick="submitForm()" class="btn btn-primary">Add Product</button>
        </div>
    </main>
</body>

</html>