<?php
include '../koneksi-user/koneksi-user.php';

session_start(); // Tambahkan ini pada awal script

$error = "Invalid username or password";

// Verifikasi apakah formulir login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai yang dikirimkan dari formulir
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Query SQL untuk memeriksa keberadaan pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM users WHERE username='$entered_username' AND password='$entered_password'";
    $result = $conn->query($query);

    // Jika hasil query menghasilkan satu baris, artinya pengguna ditemukan
    if ($result->num_rows == 1) {
        // Set session untuk menandakan bahwa pengguna sudah login
        $_SESSION['username'] = $entered_username;

        // Redirect ke halaman selamat datang
        header("Location: ../index.php");
        exit();
    } else {
        // Jika pengguna tidak ditemukan, atur pesan error
        echo '<script>alert("' . $error . '");</script>';
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
        <div class="right-form">
            <h2>LOG IN</h2>
            <form method="post" action=""> <!-- Tambahkan method="post" di sini -->
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/user-1.png" alt="user-logo">
                    </div>
                    <div class="input">
                        <input type="text" name="username" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/pass-2.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="forgot">
                    <a href="./forgot-password.php">Forgot Password?</a>
                </div>

                <!-- Pindahkan formulir ke dalam tag <form> -->
                <div class="button">
                    <button type="submit">LOGIN</button>
                </div>
            </form>

            <div class="regis">
                Don't have an account yet? <a href="./register.php">Create a Account</a>
            </div>
        </div>
    </div>
</body>

</html>
