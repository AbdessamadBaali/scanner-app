<section id="login_section">

<div class="content-reset">

    <form method="post" action="index.php" class="row">
        <i class="fa fa-key fs-1 bg_icon_reset text-center"></i>
        <h1 class="text-center text-capitalize" >Mot de passe oublié?</h1>
        <p class='text-center'>Pas de soucis, nous vous enverrons  des instructions<br> de réinitialisation.</p>
        <div class="feedback  text-danger text-capitalize">
                <?php if(isset($_SESSION['loginErorr'])) {echo  $_SESSION['loginErorr']; unset($_SESSION['loginErorr']); }?>
        </div>        
        <div class="feedback text-danger text-center text-capitalize">
             <?php
                if(isset($_SESSION['loginErorr']))
                {
                    echo $_SESSION['loginErorr'];
                    unset($_SESSION['loginErorr']);
                }
             ?>
        </div>
        <div class="my-3 p-0 col-12">
            <label for="insc_email" class="form-label">Email</label>
            <input type="email" class="form-control"  name="reset_email" value='' required>
        </div>    
        <input type="submit" class="btn bg-btn w-50 mb-3 " name="btn_reset_pass" value="Reset password">
        
        <p class="text-center"> 
            <i class="fa fa-arrow-left me-2"></i>
            Retour à
            <a class="input_submit_link" href="index.php">Login</a>
        </p>
    
    </form>
</div>
</section>

