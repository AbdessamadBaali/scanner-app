<?php
if (!isset($_SESSION['login'])) {
  header("location: ../index.php");
}
?>
    <div id="container">
      <h1>Scan QR Code</h1>
      <p>Welcome to our QR Code Scanner app! With this app, you can easily scan QR codes with your phone's camera. Simply click the "Scan QR Code" link above, and point your phone's camera at the QR code you want to scan. Our app will take care of the rest!</p>
      <div >
        <div class="qr-container m-auto">
          <div class="border-masks"></div>
          <div class="border-masks"></div>
          <div class="border-masks"></div>
          <div class="border-masks"></div>
          <span></span>
          <img src="images/image1.png" alt="QR">
        </div>
        <button id="start" >Start Scanning</button>
        <div id="qr-reader" class="m-auto"></div>
        <div id="result"></div>
        <div id="myDiv"></div>
        <?php if(isset($_SESSION['error_msg'])) {?>
            <div class='alert alert-<?= $_SESSION['alert']?> alert-dismissible fade show' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                <h4 class='alert-heading'><?= $_SESSION['icon']. $_SESSION['title']?></h4>
                <p>
                    Aww ouais, vous avez lu avec succès cet important message d'alerte. 
                    <b><?= $_SESSION['error_msg']?></b>
                </p>
            </div>
        <?php }; ?>
      </div>
    </div>
<?php
unset($_SESSION['alert']);
unset($_SESSION['title']);
unset($_SESSION['icon']);
unset($_SESSION['error_msg']);

?>







