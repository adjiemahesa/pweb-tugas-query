<html>

<head>
    <title>Aplikasi CRUD Upload Gambar dengan PHP</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/cotton/64/000000/cloud-storage.png" />
    <style type="text/css">
        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 18px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 18px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }

        /* demo styles */
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            background-color: #02055A;
            font-family: 'Urbanist', sans-serif;
        }

        section {
            margin: 50px;
        }

        /* for custom scrollbar for webkit browser*/
        ::-webkit-scrollbar {
            width: 6px;
        }

        /* ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        } */

        /* CSS */
        .button-33 {
            background-color: #89cff0;
            border-radius: 100px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
            color: black;
            cursor: pointer;
            display: inline-block;
            font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            transition: all 250ms;
            border: 0;
            font-size: 18px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-33:hover {
            box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <section>

        <h1>Data Siswa</h1>
        <a href="form_simpan.php"><button class="button-33" role="button">Tambah Data</button></a><br><br>

        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th colspan="2" style="text-align:center; padding-right: 60px">Aksi</th>
                    </tr>
                    <div class="button-41">
                        <?php
                        // Load file koneksi.php
                        include "koneksi.php";
                        // Buat query untuk menampilkan semua data siswa
                        $sql = $pdo->prepare("SELECT * FROM siswa");
                        $sql->execute(); // Eksekusi querynya
                        while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
                            echo "<tr>";
                            echo "<td><img src='images/" . $data['foto'] . "' width='100' height='100'></td>";
                            echo "<td>" . $data['nrp'] . "</td>";
                            echo "<td>" . $data['nama'] . "</td>";
                            echo "<td>" . $data['jenis_kelamin'] . "</td>";
                            echo "<td>" . $data['telp'] . "</td>";
                            echo "<td>" . $data['alamat'] . "</td>";
                            echo "<td><a href='form_ubah.php?id=" . $data['id'] . "'>Ubah</a></td>";
                            echo "<td><a href='proses_hapus.php?id=" . $data['id'] . "'>Hapus</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </div>
                </thead>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({
                'padding-right': scrollWidth
            });
        }).resize();
    </script>
</body>

</html>
<!-- HTML !-->