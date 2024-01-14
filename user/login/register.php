<?php
include '../koneksi-user/koneksi-user.php';

// Verifikasi apakah formulir pendaftaran telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai yang dikirimkan dari formulir
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['PhoneNum'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Implementasikan validasi input dan keamanan yang diperlukan di sini

    // Simpan data ke dalam database (gantilah dengan query ke database)
    // Misalnya, menggunakan PDO untuk koneksi dan prepared statement
    try {
        $conn = new PDO("mysql:host=localhost;dbname=nama_database", "nama_pengguna", "kata_sandi");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Gantilah ini dengan query sesuai kebutuhan Anda
        $query = "INSERT INTO users (username, fullname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $fullname, $email, $phone, $hashedPassword]);

        // Redirect ke halaman selamat datang atau halaman login
        header("Location: ./login.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
    <title>LOGIN | Kicks & Chic</title>
</head>

<body>
    <div class="container">
        <div class="left-logo">
            <img src="../../assets/logo-knc.png" alt="logo-knc">
            <h3>WELCOME TO</h3>
            <h1>KICKS & CHIC</h1>
        </div>
        <div class="regis-right-form">
            <form action="">
                <h2>Create an account</h2>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/user-1.png" alt="user-logo">
                    </div>
                    <div class="input">
                        <input type="text" name="username" id="username" placeholder="Username" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/name-logo(1).png" alt="name-logo">
                    </div>
                    <div class="input">
                        <input type="text" name="fullname" id="fullname" placeholder="Fullname" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/e-mail (1).png" alt="email-logo">
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="E-Mail" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/phone.png" alt="phone-logo">
                    </div>
                    <div class="input">
                        <input type="tel" name="PhoneNum" id="PhoneNum" placeholder="Phone Number" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/pass-2.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" placeholder="Password" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/pass-2.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" placeholder="Confirm Password" require>
                    </div>
                </div>
                <div class="policy">
                    <input type="checkbox" name="policy" id="policy" value="agree" require><label for="policy">I agree with <a href="./privacy-policy.php"> privacy and policy</a></label>
                </div>
                <div class="button" style="margin-top: 20px;">
                    <button type="submit">REGISTER</button>
                </div>
            </form>
            <div class="regis">
                Have an Account? <a href="./login.php">Login Here</a>
            </div>
        </div>
    </div>
</body>

</html>