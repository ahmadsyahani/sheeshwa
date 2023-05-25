<?php
include('koneksi.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 700px;
        }

        h1 {
            margin-top: 20px;
            font-size: 36px;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            border: none;
            background-color: #f5f5f5;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
            margin-right: 50vh;
        }

        label {
            font-size: 16px;
            color: #333333;
            margin-bottom: 10px;
            margin-top: v 18px;
            display: block;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 50px;
            margin-left: 50vh;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        select option[disabled]:first-child {
            display: none;
        }

        select:focus {
            outline: none;
        }

        section {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Tambah Data</h1>
        <center>
            <form method="POST" action="add_process.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>NIS</label>
                        <input type="number" name="nis" required="" />
                    </div>
                    <div>
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" autofocus="" required="" />
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
                        <label>Gambar Siswa</label>
                        <input type="file" name="foto" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Data</button>
                    </div>
                </section>
            </form>
</body>

</html>