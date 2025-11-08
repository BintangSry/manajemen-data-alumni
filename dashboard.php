<?php
session_start();
include 'koneksi.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumni</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>
    <header class="navbar">
        <h1>Manajemen Data Alumni</h1>
        <div class="nav-actions">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>
    <main class="content">
        <div class="table-header">
            <h2>Daftar Alumni</h2>
            <a href="tambah.php" class="add-btn">+ Tambah Data</a>
        </div>
        <table class="alumni-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM alumni");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['angkatan'] ?></td>
                        <td><?= $data['jurusan'] ?></td>
                        <td class="actions">
                            <a href="edit.php?id_alumni=<?= $data['id_alumni'] ?>" class="edit-btn">Edit</a>
                            <a href="delete.php?id_alumni=<?= $data['id_alumni'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>