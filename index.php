<?php
include('koneksi.php');
session_start();

$username = $_SESSION['username'];

$query = "SELECT username FROM users WHERE id = '$username'";
$result = mysqli_query($koneksi, $query);

date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai dengan lokasi Anda

$now = date('H:i'); // Dapatkan waktu saat ini dalam format jam:menit
$greeting = '';

if ($now >= '05:00' && $now < '10:00') {
    $greeting = 'Selamat Pagi';
} elseif ($now >= '10:00' && $now < '15:00') {
    $greeting = 'Selamat Siang';
} elseif ($now >= '15:00' && $now < '18:00') {
    $greeting = 'Selamat Sore';
} else {
    $greeting = 'Selamat Malam';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/images/sheesh.png" rel="shortcut icon">

    <title>Sheeshwa</title>

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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background-color: var(--first-color);
            color: var(--white-color);
            padding: 35px;
        }

        .header h1 {
            margin: 0;
            font-weight: bold;
            font-size: 25px;
            color: var(--white-color);
        }
        .date {
            font-size: 23px;
            color: var(--white-color);
            text-align: left;
            /* Mengatur teks menjadi rata kiri */
        }

        h1 {
            margin-bottom: 50px;
            color: #333;
            font-size: 35px;
            text-align: center;
            margin-top: 5vh;
            margin-bottom: 20px;
        }

        table {
            margin: auto;
            width: 60%;
            border-radius: 9px;
            border-collapse: collapse;
            background-color: #fff;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            border: none;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--first-color);
            color: #fff;
            font-weight: normal;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }

        .btn_add {
            margin-left: 41vh;
            display: inline-block;
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-top: 15px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .button_edit,
        .button_hapus,
        .button_detail {
            display: inline-block;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            margin-right: 8px;
            transition: background-color 0.3s;
        }

        .button_edit {
            background-color: #4caf50;
        }

        .button_edit:hover {
            background-color: #3e8e41;
        }

        .button_hapus {
            background-color: #f44336;
        }

        .button_hapus:hover {
            background-color: #c62828;
        }

        .button_detail {
            background-color: #009688;
        }

        .button_detail:hover {
            background-color: #00796b;
        }
        .notification{
            position: absolute;
            bottom: 50px;
            left: 50px;
            width: max-content;
            padding: 20px 15px;
            border-radius: 5px;
            background-color: var(--first-color);
            color: var(--white-color);
            box-shadow: 0 1px 10px rgba(0,0,0,0.1);
            transform: translateY(30px);
            opacity: 0;
            visibility: hidden;
            animation: fade-in 4s linear forwards;
        }
        .notification__progress {
            position: absolute;
            left: 5px;
            bottom: 5px;
            width: calc(100% - 10px);
            height: 3px;
            transform: scaleX(0);
            transform-origin: left;
            background-image: linear-gradient(to right, #fff, #e5e6e4);
            border-radius: inherit;
            animation: load 3s 0.25s linear forwards;
        }
        @keyframes fade-in {
        5% {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        90% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes load {
        to {
            transform: scaleX(1);
        }
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>
            <?php echo $greeting; ?>,
            <?php echo $username; ?>
        </h1>
        <div class="clock" id="clock"></div>
        <div class="date" id="date"></div>
    </div>

    <nav class="nav">
        <ul class="nav__list">
            <a href="index.php" class="nav__link">
                <i class="ri-apps-line"></i>
                <span class="nav__name">Home</span>
            </a>

            <a href="auth/logout.php" class="nav__link">
                <i class="ri-logout-box-line"></i>
                <span class="nav__name">Logout</span>
            </a>
        </ul>

        <!-- Shapes -->
        <div class="nav__circle-1"></div>
        <div class="nav__circle-2"></div>

        <div class="nav__square-1"></div>
        <div class="nav__square-2"></div>
    </nav>

    <!-- Tabel -->
    <section class="home">
        <h1>Data Siswa</h1>
        <a class="btn_add" href="add_product.php">+Tambah Data</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM siswa ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $row['nis']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama_siswa']; ?>
                        </td>
                        <td>
                            <?php echo ($row['gender'] == 'male') ? 'Laki-Laki' : 'Perempuan'; ?>
                        </td>
                        <td>
                            <?php echo ($row['kelas'] == '10') ? 'X' : (($row['kelas'] == '11') ? 'XI' : 'XII'); ?>
                        </td>
                        <td>
                            <?php echo ($row['jurusan']); ?>
                        </td>
                        <td style="text-align: center;"><img src="gambar/<?= $row['foto']; ?>" style="width: 150px;"></td>
                        <td>
                            <a class="button_edit" href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="button_hapus" href="hapus.php?id=<?= $row["id"] ?>"
                                onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                            <a class="button_detail" href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <div class="notification">
            <p>Selamat Datang, <?php echo $username; ?></p>
            <span class="notification__progress "></span>
        </div>
    </section>
    <script>
        function updateDate() {
            var now = new Date();
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            var day = now.getDay();
            var date = now.getDate();
            var month = now.getMonth();
            var year = now.getFullYear();

            var formattedDate = days[day] + ', ' + date + ' ' + months[month] + ' ' + year;

            document.getElementById('date').textContent = formattedDate;
        }

        updateDate(); // Memanggil fungsi updateDate() untuk pertama kali
    </script>
</body>

</html>