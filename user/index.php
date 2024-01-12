<?php
include './koneksi-user/koneksi-user.php';

$sql = "SELECT * FROM shoes";
$result = $conn->query($sql);
$count = 0;
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
                <i class="fas fa-user"></i>
            </div>
        </div>
    </nav>
    <main>
        <div class="banner">
            <img class="frame-kiri" src="../assets/Banner-1.jpg" />
            <img class="frame-kanan" src="../assets/Promo-1.jpg" />
        </div>
        <div class="title">
            <h1>WELCOME TO KICKS & CHIC</h1>
            <p>Home of quality shoes from many brands</p>
        </div>
        <div class="product-warp">
            <h1>Our Items</h1>
            <div class="product-list">
                <?php
                if ($result->num_rows > 0) {
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($counter < 10) {
                            $productName = $row['shoes_name'];
                            $price = $row['price'];
                            $imagePath = '../admin/foto_database/' . $row['img_1'];
                ?>
                            <div class="product-view">
                                <img class="" src="<?php echo $imagePath; ?>" alt="">
                                <div class="bawah">
                                    <h3 class="judul"><?php echo $productName; ?></h3>
                                    <div class="rating">
                                        <i class="fas fa-star" style="color: gold;"></i>
                                        <p>5.0 - 28 Items sold</p>
                                    </div>
                                    <p><strong>IDR <?php echo $price; ?>,00</strong></p>
                                </div>
                            </div>
                <?php
                            $counter++;
                        } else {
                            break;
                        }
                    }
                } else {
                    echo "Tidak ada data yang ditemukan";
                }
                ?>

            </div>
            <a href="./product.php"><button class="view-more">VIEW MORE</button></a>
        </div>
    </main>
    <div class="footer">
        <div class="footer-content">
            <div class="nav">
                <div class="text-wrapper">Home</div>
                <div class="text-wrapper-2">About</div>
                <div class="text-wrapper-2">Store</div>
                <div class="text-wrapper-2">Privacy Policy</div>
                <div class="text-wrapper-2">FAQ</div>
            </div>
            <div class="social-media">
                <div class="tittle">
                    <p class="p">Keep in touch with us!</p>
                </div>
                <img class="logo" src="img/logo.svg" />
            </div>
            <div class="brand">
                <div class="text-wrapper-3">Our Partners</div>
                <div class="line">
                    <img class="img" src="img/gg-adidas.svg" />
                    <div class="frame-2"></div>
                    <div class="frame-3"></div>
                    <img class="img" src="img/simple-icons-nike.svg" />
                    <div class="frame-4"></div>
                </div>
                <div class="line-2">
                    <img class="img" src="img/simple-icons-puma.svg" />
                    <img class="img" src="img/simple-icons-reebok.svg" />
                    <div class="frame-5"></div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="COPYRIGHT-kicks">COPYRIGHT©2023 - Kicks &amp; Chic</p>
        </div>
    </div>
    <script>
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