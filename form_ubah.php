<html>

<head>
    <title>Form Ubah - Aplikasi CRUD Upload Gambar dengan PHP</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/cotton/64/000000/cloud-storage.png" />
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: #4CAF50;
        }

        .container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #styling input[type="text"],
        #styling input[type="email"],
        #styling input[type="tel"],
        #styling input[type="url"],
        #styling textarea,
        #styling button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #styling {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #styling h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #styling p {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #styling input[type="text"],
        #styling input[type="email"],
        #styling input[type="tel"],
        #styling input[type="url"],
        #styling textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #styling input[type="text"]:hover,
        #styling input[type="email"]:hover,
        #styling input[type="tel"]:hover,
        #styling input[type="url"]:hover,
        #styling textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #styling textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        #styling button[type="submit"] {
            cursor: pointer;
            width: 30%;
            border: none;
            background: #4CAF50;
            color: #FFF;
            margin-top: 30px;
            padding: 10px;
            font-size: 15px;
        }

        #styling button[type="button"] {
            cursor: pointer;
            width: 30%;
            border: none;
            background: #4CAF50;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #styling button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #styling button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #styling input:focus,
        #styling textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        // Load file koneksi.php
        include "koneksi.php";
        // Ambil data NIS yang dikirim oleh index.php melalui URL
        $id = $_GET['id'];
        // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
        $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
        $sql->bindParam(':id', $id);
        $sql->execute(); // Eksekusi query insert
        $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
        ?>
        <form id="styling" method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <h3>Ubah Data Siswa</h3>
            <fieldset>
                <p>NIS</p>
                <input placeholder="NIS" type="text" name="nis" value="<?php echo $data['nis']; ?>" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <p>Nama</p>
                <input placeholder="Your Name" type="text" name="nama" value="<?php echo $data['nama']; ?>" tabindex="2" required>
            </fieldset>
            <fieldset>
                <p>Jenis Kelamin</p>
                <?php
                if ($data['jenis_kelamin'] == "Laki-laki") {
                    echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
                    echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
                } else {
                    echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
                    echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
                }
                ?>
            </fieldset>
            <fieldset>
                <p>Telepon</p>
                <input placeholder="Your Phone" type="text" name="telp" value="<?php echo $data['telp']; ?>" tabindex="4" required>
            </fieldset>
            <fieldset>
                <p>Alamat</p>
                <textarea placeholder="Type your address here..." name="alamat" tabindex="5" required><?php echo $data['alamat']; ?></textarea>
            </fieldset>
            <fieldset>
                <p>Foto</p>
                <input placeholder="Upload your photo here..." type="file" name="foto" tabindex="5">
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" value="Ubah" id="styling-submit" data-submit="...Sending">Submit</button>
                <a href="index.php"><button type="button" value="Batal">Batal</button></a>
            </fieldset>
        </form>
    </div>
</body>

</html>