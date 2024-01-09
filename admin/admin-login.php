<?php
include './koneksi-admin/koneksi-admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['ID_Admin'];
  $password = $_POST['admin_Pass'];

  // Query ke database untuk memeriksa keberadaan admin
  $query = "SELECT * FROM admin_tables WHERE ID_Admin = '$nama' AND admin_Pass = '$password'";
  $result = mysqli_query($conn, $query);

  // Jika data admin ditemukan, alihkan ke halaman admin yang diinginkan
  if (mysqli_num_rows($result) > 0) {
      $admin_data = mysqli_fetch_assoc($result);

      session_start();
      $_SESSION['ID_Admin'] = $admin_data['id'];
      // Sesuaikan alihkan ke halaman yang diinginkan setelah login berhasil
      header("Location: admin-dashboard.php");
      exit();
  } else {
      // Jika data admin tidak ditemukan, tampilkan pesan kesalahan
      $message = "Username atau password salah. Silakan coba lagi.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Admin</title>
  <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
  <div class="login-container">
    <form action="" method="post">
      <h2>Login</h2>
      <div class="input-group">
        <label for="username">Admin ID :</label>
        <input type="text" id="ID_Admin" name="ID_Admin" required>
      </div>
      <div class="input-group">
        <label for="password">Password :</label>
        <input type="password" id="admin_Pass" name="admin_Pass" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>