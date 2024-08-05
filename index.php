<?php require "includes/header.php"; ?>

<!-- hello from index -->
 <?php 
 
 if(isset($_SESSION['username'])) {
    echo "Hello " . $_SESSION['username'];
 } else {
    echo "Welcome to the Home Page";
 }

  ?>
<?php require "includes/footer.php"; ?>
