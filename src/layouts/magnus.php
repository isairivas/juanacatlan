<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
  include 'magnus/head.php';
  include 'magnus/header.php';
  ?>
  </head>
  <body>
  <?php echo Application::$view->getContent(); ?>
  <?php include 'magnus/footer.php'; ?>
  </body>
  </html>
