<?php
    $status = isset($_GET['status']) ? $_GET['status'] : ' ';
    $file_name = "Buku.txt";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA BUKU</title>
</head>
<body style="background-color: bisque;">
    <div>
        <nav>
            <h1>Koleksi Buku</h1>
            <ul>
                <li>
                    <a href="form.php">Tambah Data Buku</a>
                </li>
            </ul>
        </nav>
        <div>
            <main role="main">
                <?php
                    if($status == 'berhasil') {
                        echo "<br>Data Buku Berhasil ditambah";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>
                <h2 style="text-align : center; color: blue">DATA BUKU</h2>
                <div>
                    <table border="1" style="margin-left:auto; margin-right:auto;">
                        <thead>
                            <tr>
                                <th style="background-color:aqua;">Kode Buku</th>
                                <th style="background-color: aqua ;">Judul</th>
                                <th style="background-color: aqua ;">Pengarang</th>
                                <th style="background-color: aqua ;">Penerbit</th>
                                <th style="background-color: aqua ;">Tahun Terbit</th>
                                <th style="background-color: aqua;">Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach (file($file_name) as $line) :
                                    $dataBuku = explode("-", $line);
                            ?>
                            <tr>
                                <td><?= $dataBuku[0]; ?></td>
                                <td><?= $dataBuku[1]; ?></td>
                                <td><?= $dataBuku[2]; ?></td>
                                <td><?= $dataBuku[3]; ?></td>
                                <td><?= $dataBuku[4]; ?></td>
                                <td><img src="./<?= $dataBuku[5]; ?>" alt="gambar" width="200px"></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>