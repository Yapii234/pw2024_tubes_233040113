<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './meta.php' ?>

</head>
<body>
    <?php include './include/navbar.php'?>
    <?php 
    ?>
    <?php include './include/footer.php'?>
<?php include './script.php' ?>
<script>
    document.getElementById('mobile-menu').addEventListener('click', function() {
        var navList = document.querySelector('.nav-list');
        navList.classList.toggle('active');
    });
</script>
</body>
</html>
</html>