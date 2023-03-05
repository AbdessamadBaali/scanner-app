<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>QR Code Scanner</title>
    <title>Scanner app</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon shortcut" href="images/ricon-scanner.png">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/main.css">
    <!-- font-awesome cdn and vendor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- jquery cdn -->
   <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
   <!-- bootstrap cdn -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" >

  </head>
  <body>
    <?php
        include_once "controller/controllerApp.php";
        $controle = new Controller_App();
        $controle->execute_app() ;
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    ?>
    <!-- Bootstrap cdn JavaScript and vendor-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
     
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="./node_modules/html5-qrcode/html5-qrcode.min.js" type="text/javascript"></script>
    <script src="scriptJS/main.js"> </script>
  </body>
</html>
