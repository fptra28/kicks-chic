<?php
include './koneksi-user/koneksi-user.php';

$sql = "SELECT * FROM shoes ORDER BY create_date DESC";
$result = $conn->query($sql);

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
        <div class="filter">
            <select name="brand" id="brand">
                <option value="" selected disabled>Brand</option>
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
            <select name="brand" id="brand">
                <option value="" selected disabled>Price</option>
                <option value="low-2-high">Lowest to highest price</option>
                <option value="high-2-low">highest to Lowest price</option>
            </select>
            <div class="pemisah"></div>
            <button>More Filter</button>
        </div>
        <div class="product-warp">
            <h1>Product</h1>
            <div class="product-list">
                <?php
                if ($result->num_rows > 0) {
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) {
                        $productName = $row['shoes_name'];
                        $price = $row['price'];
                        $imagePath = '../admin/foto_database/' . $row['img_1'];
                ?>
                        <div class="product-view">
                            <a href="details-product.php?id=<?php echo $productName; ?>">
                                <img class="" src="<?php echo $imagePath; ?>" alt="">
                                <div class="bawah">
                                    <h3 class="judul"><?php echo $productName; ?></h3>
                                    <div class="rating">
                                        <i class="fas fa-star" style="color: gold;"></i>
                                        <p>5.0 - 28 Items sold</p>
                                    </div>
                                    <p><strong><?php echo formatRupiah($price); ?></strong></p>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo "Tidak ada data yang ditemukan";
                }
                ?>

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