
<?php 

    include 'mooncake/doctype.php';
    include 'mooncake/header.php';
   
    include 'mooncake/menu_sidebar.php';
     include 'mooncake/navigation.php';
 
?>

  <?php echo Application::$view->getContent(); ?>
  
<?php include 'mooncake/footer.php'; ?>


