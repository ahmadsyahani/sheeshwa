<?php
//koneksi
include 'koneksi.php';

if (isset($_GET['id'])) {

    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM siswa WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    // ambil data dari database
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"],
        input[type="text"],
        select {
            padding: 5px;
            margin-bottom: 10px;
            width: 100%;
        }

        select option[disabled] {
            color: #999;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <center>
        <h1>Edit Data <?php echo $data['nama_siswa']; ?></h1>
        <center>
            <form method="POST" action="edit_process.php" enctype="multipart/form-data">
                <section class="base">
                    <input name="id" value="<?php echo $data['id']; ?>" hidden />
                    <div>
                        <label>NIS</label>
                        <input type="number" name="nis" readonly value="<?= $data['nis']; ?>" />
                    </div>
                    <div>
                        <label>Nama Siswa</label>
                        <input type="text" value="<?= $data['nama_siswa']; ?>" name="nama_siswa" required="" />
                    </div>
                    <div>
                        <label>Gender</label>
                        <select name="gender" id="sex" required="">
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="male">Laki-Laki</option>
                            <option value="female">Perempuan</option>
                        </select>


                    </div>
                    <div>
                        <label>Kelas</label>
                        <select name="kelas" id="kelas_siswa" required="">
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                        </select>
                    </div>
                    <div>
                        <label>Jurusan</label>
                        <select name="jurusan" id="jurusan_siswa" required="">
                            <option value="" disabled selected>Pilih Jurusan</option>
                            <option value="rpl">RPL</option>
                            <option value="tkj">TKJ</option>
                            <option value="otkp">OTKP</option>
                            <option value="tkr">TKR</option>
                            <option value="akl">AKL</option>
                            <option value="mm">MultiMedia</option>
                            <option value="tedk">TEDK</option>
                        </select>
                    </div>
                    <div>
                        <label>Gambar Produk</label>
                        <input type="file" name="foto" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Produk</button>
                    </div>
                </section>
            </form>
</body>

</html>