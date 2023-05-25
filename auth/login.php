<?php
session_start();
include '../koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            // set session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];

            header("Location: ../index.php");
            exit;
        }
    }

    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/register.css">
    <title>Login</title>
</head>

<body>
    <section class="login">
        <div class="form-box">
            <form action="" method="post" class="form-value" autocomplete="off">
                <h2>Login</h2>

                <?php if (isset($error) && $error) : ?>
                    <div style="color: red; margin-bottom: 10px; margin-top: 15px; font-size: 15px;">Username or password is incorrect.</div>
                <?php endif; ?>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="user" name="username" id="username" autocomplete="off" required>
                    <label for="username">Username</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" name="login">Log in</button>
                <div class="register">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </section>

    <?php if (isset($_SESSION['failed-login'])) : ?>
        <script>
            const modal = document.querySelector('#modal-failed')
            modal.classList.add('show')
        </script>
        <?php unset($_SESSION['failed-login']); ?>
    <?php endif; ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
