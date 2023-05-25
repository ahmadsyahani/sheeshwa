<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama_siswa   = $_POST['nama_siswa'];
$nis    = $_POST['nis'];
$gender    = $_POST['gender'];
$kelas    = $_POST['kelas'];
$jurusan   = $_POST['jurusan'];
$foto = $_FILES['foto']['name'];


if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);


        $query  = "UPDATE siswa SET nama_siswa= '$nama_siswa', nis= '$nis', gender = '$gender', kelas = '$kelas', jurusan = '$jurusan', foto = '$nama_gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
    }
} else {
    $query  = "UPDATE siswa SET nama_siswa= '$nama_siswa', nis= '$nis', gender = '$gender', kelas = '$kelas', jurusan = '$jurusan', foto = '$nama_gambar_baru'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
