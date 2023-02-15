<section id="login_section">
    <div id='content-login'>

        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" id="login_form" >
            <h1 >Content De Te Revoir</h1>
            <p class="text-capitalize">bon retour merci d'entrer vos coordonnées</p>
            <div class="feedback  text-danger">
                <?php if(isset($_SESSION['loginErorr'])){
                        echo  $_SESSION['loginErorr']; 
                        unset($_SESSION['loginErorr']);} ?>
            </div>
    
            <div class="mb-3">
                <label for="id_login_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="id_login_email" name="email_log" required
                    value="<?php 
                if(isset($_COOKIE['login_cookie'])) {echo $_COOKIE['login_cookie']; } else echo ''; ?>" >
            </div>

            <div class="mb-3">
                <label for="id_login_pw" class="form-label">Password</label>
                <input type="password" class="form-control" name="pw_log" id="id_login_pw" value="" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember_info" id="remember_info_checkbox">
                <label class="form-check-label" for="remember_info_checkbox">Rappelez-vous pendant 30 jours</label>
                <a class="input_submit_link text-info-400" href="index.php?forgotPass">Mot de passe oublié?</a>
            </div>

            <input type="submit" class="btn bg-btn w-50 mb-3" name="btn_login" value="Sign in">

        </form>
    </div>
</section>
