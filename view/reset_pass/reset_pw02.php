
 <section id="login_section">

    <div class="content-reset">
        <form method="post" action="index.php" class="row">
            <i class="fa fa-key fs-1 bg_icon_reset text-center"></i>
            <h1 class="text-center" >Definir un nouveau mot de passe</h1>
            <p class="text-center">Votre nouveau mot de passe doit être différent <br> des mots de passe précédemment utilisés.</p>
            <div class="feedback  text-danger text-capitalize">
                <?php if(isset($_SESSION['passErorr'])) {echo  $_SESSION['passErorr']; unset($_SESSION['passErorr']); }?>
            </div>
          <div class="feedback text-danger text-center text-capitalize">
          <?php 

                if(isset($_SESSION['pw']) )
                {
                    echo $_SESSION['pw'];
                }
                if (isset($_SESSION['code']) )
                {
                    echo $_SESSION['code'];
                }
            ?>
          </div>
            <div class="mb-3 p-0">
                <label for="reset-pw" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="reset-pw" name="reset_pw">
                <div id="emailHelp" class="form-text text-capitalize">Doit contenir au moins 8 caractères.</div>
            </div>

            <div class="mb-3 p-0">
                <label for="reset-confirm-pw" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="reset-confirm-pw" name="reset_confirm_pw">
            </div>

            <div class="mb-3 p-0">
                <label for="reset-confirm-pw" class="form-label">Validate Code</label>
                <input type="text" class="form-control" id="reset-code" name="reset_code">
            </div>

            <input type="submit" class="btn bg-btn w-50 mb-3" name="btn_set_new_pw" value="Reset Password">

            <p class="text-center"> 
                <i class="fa fa-arrow-left me-2"></i>
                Retour à
                <a class="input_submit_link" href="index.php">Login</a>
            </p>
        
        </form>
    </div>
</section>
