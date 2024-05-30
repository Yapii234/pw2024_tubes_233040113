<?php
include '../config.php'; // Pastikan path ke config.php benar

// Cek apakah ID konten telah diberikan
if (isset($_GET['content_id'])) {
    $id = $_GET['content_id'];

    // Mengambil data konten dari database
    $sql = "SELECT * FROM isi WHERE content_id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak diberikan!";
    exit;
}

// Menghandle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content_title = $_POST['content_title'];
    $content = $_POST['content'];
    $content_url = $_POST['content_url'];
    $content_picture = $_FILES['content_picture']['name'];

    // Update data ke database
    $sql = "UPDATE isi SET content_title=?, content=?, content_url=?, content_picture=? WHERE content_id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $content_title, $content, $content_url, $content_picture, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diupdate');window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $content_photo = $_FILES['content_picture']['name'];

     // Handle file upload
    if (is_uploaded_file($_FILES['content_picture']['tmp_name'])) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES['content_picture']['name']);
        if (move_uploaded_file($_FILES['content_picture']['tmp_name'], $target_file)) {
            echo "<script>alert('File " . $_FILES['content_picture']['name'] . " upload berhasil.');</script>";
        } else {
            echo "<script>alert('upload gagal');</script>";
        }
    } else {
        echo "Possible file upload attack: filename '". $_FILES['content_picture']['tmp_name'] . "'.";
    }

    // Query untuk insert data
    $sql = "INSERT INTO movies_content (content_title, content, content_url, content_picture) VALUES (?, ?, ?, ?)";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../meta.php'; ?>
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2>Edit Konten Film</h2>
        <form method="POST" action="edit.php?content_id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="content_title">Judul Konten</label>
                <input type="text" class="form-control" id="content_title" name="content_title" value="<?php echo $row['content_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Film</label>
                <input type="text" class="form-control" id="content" name="content" value="<?php echo $row['content']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content_url">URL</label>
                <input type="text" class="form-control" id="content_url" name="content_url" value="<?php echo $row['content_url']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content_picture">Foto</label>
                <input type="file" class="form-control" id="content_picture" name="content_picture" required>
                <img src="../assets/img/<?php echo $row['content_picture']; ?>" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include '../script.php'; ?>
</body>
</html>