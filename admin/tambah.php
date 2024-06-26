<?php
include '../config.php'; // Pastikan path ke config.php benar

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $content_title = $_POST['content_title'];
    $content = $_POST['content'];
    $content_url = $_POST['content_url'];
    $content_picture = $_FILES['content_picture']['name'];
    $admin_id = $_POST['admin_id'];

     // Handle file upload
    if (is_uploaded_file($_FILES['content_picture']['tmp_name'])) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES['content_picture']['name']);
        if (move_uploaded_file($_FILES['content_photo']['tmp_name'], $target_file)) {
            echo "<script>alert('File " . $_FILES['content_picture']['name'] . " upload berhasil.');</script>";
        } else {
            echo "<script>alert('upload gagal');</script>";
        }
    } else {
        echo "Possible file upload attack: filename '". $_FILES['content_picture']['tmp_name'] . "'.";
    }

    // Query untuk insert data
    $sql = "INSERT INTO movies_content (content_title, content_movies, url_content, content_picture, admin_id) VALUES ('$content_title', '$content', '$url_content', '$content_picture', '$admin_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Data Ditambahkan";
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../meta.php'; ?>
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2>Tambah Konten Film</h2>
        <form method="POST" action="tambah_konten.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="content_title">Judul Konten</label>
                <input type="text" class="form-control" id="content_title" name="content_title" required>
            </div>
            <div class="form-group">
                <label for="content_movies">Film</label>
                <input type="text" class="form-control" id="content_movies" name="content_movies" required>
            </div>
            <div class="form-group">
                <label for="url_content">URL</label>
                <input type="text" class="form-control" id="url_content" name="url_content" required>
            </div>
            <div class="form-group">
                <label for="content_photo">Foto</label>
                 <input type="file" class="form-control" id="content_picture" name="content_picture" required>
            </div>
             <div class="form-group">
                <label for="admin_id">Admin Id</label>
                <input type="text" class="form-control" id="admin_id" name="admin_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include '../script.php'; ?>
</body>
</html>