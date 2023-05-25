<?php
    $file_name = fopen("Buku.txt", "a+");
    $status ='';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $KodeBuku = $_POST['KodeBuku'];
        $JudulBuku = $_POST['JudulBuku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $TahunTerbit = $_POST['TahunTerbit'];
        $CoverBuku= $_FILES['CoverBuku'];

        $nameFile = $KodeBuku.'-'.$CoverBuku['name'];
        $temp = $CoverBuku['tmp_name'];

        $directory_files = "Cover/";

        $upload = move_uploaded_file($temp, $directory_files.$nameFile);
        if(!$upload){
            echo "<script>alert('Failed To Save the Image')</script>";
        }

        $data = '';
        $data .= $KodeBuku."-";
        $data .= $JudulBuku."-";
        $data .= $pengarang."-";
        $data .= $penerbit."-";
        $data .= $TahunTerbit."-";
        $data .= $directory_files.$nameFile."\n";

        $save_data = fwrite($file_name, $data);

        if($save_data == false) {
            $status = 'error';
        } else {
            $status = 'berhasil';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body style="background-color: pink;">
    <div>
        <nav>
            <h1>KOLEKSI BUKU</h1>
            <ul>
                <li>
                    <a href="index.php">Kembali di Data</a>
                </li>
            </ul>
        </nav>
        <div>
            <main role="main">
                <?php
                    if($status == 'berhasil') {
                        echo "<br>Data Buku Berhasil Disimpan";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>

                <h2>Tambah Data Buku </h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="KodeBuku">Kode Buku</label>
                        <input type="number" name="KodeBuku" required>
                    </div>
                    <div>
                        <label for="JudulBuku">Judul Buku</label>
                        <input type="text" name="JudulBuku" required>
                    </div>
                    <div>
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" required>
                    </div>
                    <div>
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" required>
                    </div>
                    <div>
                        <label for="TahunTerbit">Tahun Terbit</label>
                        <input type="number" name="TahunTerbit" required>
                    </div>
                    <div>
                        <label for="CoverBuku">Cover</label>
                        <input type="file" name="CoverBuku" required>
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>