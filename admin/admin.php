<?php 
include '../config.php'; // Pastikan path ke config.php benar
session_start();
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../meta.php' ?>
</head>
<body>
    <?php include '../include/navbar.php'?>
<div class="container-fluid" style="padding-top: 52px;">
        <h2>Konten</h2>

    <a href="tambah.php" class="btn btn-danger">Tambah Konten</a>
    <br>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Judul Konten</th>
                    <th scope="col">Film</th>
                    <th scope="col">URL</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config.php'; // Pastikan path ke config.php benar
                $sql = "SELECT content_id, content_title, content, content_url, content_picture FROM isi";
                if ($search) {
                $sql .=" WHERE content_title LIKE '%$search%'";
                }
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $no++ . "</th>";
                        echo "<td>" . $row["content_title"] . "</td>";
                        echo "<td>" . $row["content"] . "</td>";
                        echo "<td>" . $row["content_url"] . "</td>";
                        echo "<td><img src='../assets/img/" . $row["content_picture"] . "' style='width: 100px;'></td>";
                        echo "<td><a href='edit.php?content_id= ". $row["content_id"]  .  "'class='btn btn-success' onclick='return confirm(\"Yakin Diubah?\");'><i class='bi bi-pencil'></i>Edit</a>
                                <a href='hapus.php?content_id= ". $row["content_id"]  . "' class='btn btn-danger' onclick='return confirm(\"Yakin Dihapus?\");'><i class='bi bi-trash'></i> Hapus</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>


    <?php include '../include/footer.php' ?>

    <?php include '../script.php'; ?>
</body>
</html>