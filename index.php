<?php
include("config.php");

$search = isset($_GET["search"]) ? $_GET["search"] : null ;
$sql = "SELECT content_title, content, content_url, content_picture FROM isi";
if ($search) {
    $sql .=" WHERE content_title LIKE '%$search%'";
  }
$result = mysqli_query($koneksi, $sql);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './meta.php' ?>
</head>

<body style="background-image: url(../assets/img/newbg.jpg); background-attachment: fixed; background-size: cover; background-position: center;">
    <?php include './include/navbar.php' ?>
    <section id="home">
    <h2 style="text-align: center; color: aliceblue;">SELAMAT DATANG</h2>
        <!-- carousel -->
        <div id="carouselExample" class="carousel slide" style="padding-top: 20px;">
            <div class="carousel-inner">
                <div class="carousel-item active" style="text-align: -webkit-center;">
                    <img src="../assets/img/1.jpg" class="d-flex w-10" alt="...>
                </div>
                <div class="carousel-item" style="text-align: -webkit-center;">
                    <img src="../assets/img/5.jpg" class="d-flex w-10" alt="...">
                </div>
                <div class="carousel-item" style="text-align: -webkit-center;">
                    <img src="../assets/img/30.webp" class="d-flex w-10" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
  <!-- Content -->
  <div class="container-sm" id="home">
      <div class="content" style="display: flex; flex-wrap: wrap; width:100%; gap:10px; place-content:center;">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="card" style="min-width: 300px; max-width: 300px; padding:0; text-align:center;">
                        <div class="wrap_image" style="border: 2px solid black; border-radius:10px; width:100%; height:200px; overflow:hidden;">
                            <img src="./assets/img/<?php echo $row['content_picture']; ?>" alt="" style="object-fit: cover; width:100%; height:200px;">
                        </div>
                        <h6 class="card-header"><?php echo $row['content_title']; ?></h6>
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['content']; ?>...</p>
                            <a href="<?php echo $row['content_url']; ?>" class="btn btn-success">Selengkapnya</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    Data tidak ditemukan.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include './include/footer.php' ?>
    <?php include './script.php' ?>
</body>
</html>
