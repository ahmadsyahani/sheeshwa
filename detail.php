<?php
include('koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $id");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    :root {
        /*========== Colors ==========*/
        --first-color: hsl(248, 74%, 58%);
        --black-color: hsl(248, 24%, 10%);
        --white-color: #fff;
        --body-color: hsl(248, 100%, 99%);

        /*========== Font and typography ==========*/
        --body-font: 'Poppins', sans-serif;
        --small-font-size: .813rem;
    }

    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
    }

    .container {
        max-width: 960px;
        border-radius: 20px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        background-color: var(--first-color);
        margin-top: 90px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .col-md-6 {
        width: 50%;
        box-sizing: border-box;
        padding: 10px;
    }

    .col-md-6 img {
        max-width: 60%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .col-md-6 h2 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 24px;
        color: var(--white-color);
        font-weight: bold;
    }

    .col-md-6 p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
        color: var(--white-color);
        margin-left: 20px;
    }

    .back-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--white-color);
        color: var(--first-color);
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        margin-top: 100px;
        margin-left: 260px;
    }
</style>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="gambar/<?= $row['foto']; ?>">
            </div>
            <div class="col-md-6">
                <h2>Nama Siswa : <?php echo $row['nama_siswa']; ?></h2>
                <h2>NIS : <?php echo $row['nis']; ?></h2>
                <h2>Jurusan : <?php echo $row['jurusan']; ?></h2>
                <h2>Kelas : <?php echo $row['kelas']; ?></h2>
                <a href="index.php" class="back-button">Kembali ke Index</a>
            </div>
        </div>
    </div>

</body>

</html>