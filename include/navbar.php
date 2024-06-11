<?php
define('BASE_URL', 'http://localhost/pw2024_tubes_233040113/');
?>
<nav class="navbar navbar-expand-lg navbar fixed-top" style="font-family: 'Lato', sans-serif; background-color: #142850;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family: 'Playfair Display', serif; font-weight: 900; color:#265073;">Travel GO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>" style=" font-family: 'Playfair Display', serif;color: #577B8D !important;
        font-weight: 700 !important;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/admin.php" style="font-family: 'Playfair Display', serif;color: #577B8D !important;
        font-weight: 700 !important;">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#home" style="font-family: 'Playfair Display', serif;color: #577B8D !important;
        font-weight: 700 !important;">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true" style="font-family: 'Playfair Display', serif;"></a>
        </li>
      </ul>
      

      <form class="d-flex" role="search" method="get">
    <input class="form-control me-2" id="Searchinput" type="search" name="search" placeholder="Search" aria-label="Search" style="font-family: 'Playfair Display', serif;" value="<?php echo isset($search) ? $search : ''; ?>">
    <button class="btn btn-outline-success" type="submit" style="font-family: 'Playfair Display', serif;">Search</button>
</form>
    </div>
  </div>
</nav>