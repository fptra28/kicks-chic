<?php
include './koneksi-user/koneksi-user.php';

// Cek apakah 'id' disetel pada parameter URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Gunakan prepared statements untuk mencegah SQL injection
    $sql = "SELECT * FROM shoes WHERE shoes_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah query berhasil
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row['shoes_name'];
        $brand = $row['brand_shoes'];
        $price = $row['price'];
        $description = $row['details'];
        $mainImage = '../admin/foto_database/' . $row['img_1'];
        $thumbnail1 = '../admin/foto_database/' . $row['img_1'];
        $thumbnail2 = '../admin/foto_database/' . $row['img_2'];
        $thumbnail3 = '../admin/foto_database/' . $row['img_3'];
        $thumbnail4 = '../admin/foto_database/' . $row['img_4'];
        $thumbnail5 = '../admin/foto_database/' . $row['img_5'];
    } else {
        // Produk tidak ditemukan, redirect ke index.php atau tampilkan pesan kesalahan
        header("Location: index.php");
        exit();
    }

    $stmt->close(); // Tutup prepared statement
} else {
    // Parameter 'id' tidak disetel, redirect ke index.php atau tampilkan pesan kesalahan
    header("Location: index.php");
    exit();
}

function formatRupiah($price)
{
    return "IDR " . number_format($price, 0, ',', '.') . ",00";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Home | Kicks & Chic</title>
</head>

<body>
    <nav class="navbar">
        <div class="left">
            <div class="logo">
                <img src="../assets/logo-knc.png" alt="Logo">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
        </div>
        <div class="right">
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="notif-icon">
                <i class="fas fa-bell"></i>
            </div>
            <div class="line-gap"></div>
            <div class="profile">
                <a href="./login/login.php"><button>LOGIN NOW</button></a>
            </div>
        </div>
    </nav>
    <main>
        <div class="detail-product">
            <div class="foto">
                <div class="main-img">
                    <img id="mainImage" src="<?php echo $mainImage; ?>" alt="">
                </div>
                <div class="thumbnail">
                    <img src="<?php echo $thumbnail1; ?>" alt="thumbnail1" class="thumbnail-img active" onclick="changeImage(event)">
                    <img src="<?php echo $thumbnail2; ?>" alt="thumbnail2" class="thumbnail-img" onclick="changeImage(event)">
                    <img src="<?php echo $thumbnail3; ?>" alt="thumbnail3" class="thumbnail-img" onclick="changeImage(event)">
                    <img src="<?php echo $thumbnail4; ?>" alt="thumbnail4" class="thumbnail-img" onclick="changeImage(event)">
                    <img src="<?php echo $thumbnail5; ?>" alt="thumbnail5" class="thumbnail-img" onclick="changeImage(event)">
                </div>

            </div>
            <div class="line-gap"></div>
            <div class="detail">
                <p class="path"><?php echo $brand; ?> > <?php echo $productName; ?></p>
                <h1><?php echo $productName; ?></h1>
                <h2><?php echo formatRupiah($price); ?></h2>
                <div class="rating">
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <p>5.0 (28 Review)</p>
                </div>
                <div class="desc">
                    <h4>DESCRIPTION</h4>
                    <p><?php echo $description; ?></p>
                </div>
                <div class="button">
                    <a href="#"><button class="buy">BUY NOW</button></a>
                    <a href="#"><button class="cart">ADD TO CART </button></a>
                </div>
            </div>
        </div>
        <div class="review">
            <h2>REVIEWS</h2>
            <img src="../assets/review.png" alt="">
            <div class="review-box">
                <h4>Most helpfull positive review</h4>
                <div class="rating">
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                </div>
                <p>The goods are good and guaranteed and the delivery is fast</p>
            </div>
            <div class="review-box">
                <h4>Trusted Seller</h4>
                <div class="rating">
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                </div>
                <p>Highly recommended buying goods form this shop, guaranteed authenticity and guaranted safety. Once again highly recommended.</p>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="logo">
                <img src="../assets/logo-knc.png" alt="logo-knc">
            </div>
            <div class="nav">
                <a href="./index.php">Home</a>
                <a href="./about.php">About</a>
                <a href="./product.php">Store</a>
                <a href="#">Privacy & Policy</a>
                <a href="#">FAQ</a>
            </div>
            <div class="social-media">
                <p class="p">Keep in touch with us!</p>
                <div class="link">
                    <img src="../assets/tiktok-logo.png" />
                    <img src="../assets/ig-logo.png" />
                    <img src="../assets/twiter-logo.png" />
                    <img src="../assets/yt-logo.png" />
                </div>
            </div>
            <div class="brand">
                <div class="text-wrapper-3">Our Partners</div>
                <div class="line">
                    <img class="img" src="../assets/adidas-logo.png" />
                    <img class="img" src="../assets/asics-logo.png" />
                    <img class="img" src="../assets/converse-logo.png" />
                    <img class="img" src="../assets/nb-logo.png" />
                    <img class="img" src="../assets/nike-logo.png" />
                </div>
                <div class="line">
                    <img class="img" src="../assets/onit-logo.png" />
                    <img class="img" src="../assets/puma-logo.png" />
                    <img class="img" src="../assets/reebok-logo.png" />
                    <img class="img" src="../assets/vans-logo.png" />
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="COPYRIGHT-kicks">COPYRIGHT©2023 - Kicks &amp; Chic</p>
        </div>
    </footer>
    <script>
        function changeImage(event) {
            if (event.target.classList.contains('thumbnail-img')) {
                // Mengganti gambar utama dengan thumbnail yang di-klik
                var mainImage = document.getElementById('mainImage');
                mainImage.src = event.target.src;

                // Mengatur class 'active' pada thumbnail yang di-klik
                var thumbnails = document.querySelectorAll('.thumbnail-img');
                thumbnails.forEach(function(thumbnail) {
                    thumbnail.classList.remove('active');
                });
                event.target.classList.add('active');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const judulElements = document.querySelectorAll('.judul');
            const maxLength = 25;

            judulElements.forEach(function(judulElement) {
                if (judulElement.textContent.length > maxLength) {
                    let trimmedString = judulElement.textContent.substring(0, maxLength);
                    judulElement.textContent = trimmedString + '...';
                }
            });
        });
    </script>
</body>

</html>