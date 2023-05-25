<?php
include '../koneksi.php';

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $password_verif = mysqli_real_escape_string($koneksi, $_POST['password_verif']);

    //cek username
    $cek = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($cek)) {
        echo "
                <script>
                    alert('Username sudah digunakan')
                </script>
            ";
        return false;
    }

    //cek password
    if ($password !== $password_verif) {
        echo "
                <script>
                    alert('Konfirmasi password tidak sesuai')
                </script>
            ";
        return false;
    };

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$username', '$email', '$password')");

    $register = mysqli_affected_rows($koneksi);
    if ($register > 0) {
        echo "
                    <script>
                        alert('Anda sudah registrasi')
                    </script>
                ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tugas Akhir</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <section class="registerasi">
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="bag-check-outline"></ion-icon>
                        <input type="password" name="password_verif" id="password_verif" autocomplete="off" required>
                        <label for="password_verif">Password Verifikasi</label>
                    </div>
                    <button type="submit" name="register">Sign Up</button>
                    <div class="register">
                        <p>Sudah punya akun ? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>