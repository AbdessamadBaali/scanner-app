<?php
include_once "model/Model.php";

class Controller_App {

   private $model_obj;

   public function __construct() {

    $this->model_obj = new Model_app();

   }

    public function execute_app() {
        // login processing
        if( isset($_POST['btn_login']))   {
            $login_user = $_POST["email_log"];
            $pass_user = $_POST["pw_log"];
           
            $_SESSION['loginErorr'] = '';

            $login_check = filter_var($login_user, FILTER_SANITIZE_EMAIL);
            $pass_check = filter_var($login_user, FILTER_SANITIZE_STRING);
            
            if (filter_var($login_check, FILTER_VALIDATE_EMAIL) == true and $pass_check == true){
                $query = "select login,user_name,etat,type_user from users where login = '$login_user' and pass = '$pass_user'";
                $result_login = $this->model_obj->all_query($query, 'select');
                if($result_login !== 0  and $result_login !== 1  and $result_login[0]->etat !== 0) {
                        $_SESSION['login'] = $login_user;
                        $_SESSION['user'] = $result_login[0]->user_name;
                        $_SESSION['typeUser'] = $result_login[0]->type_user;

                        if (isset($_POST['remember_info'])) 
                            setcookie('login_cookie',$_SESSION['login'],time()+60*60*24*30,$path = "",$domain = "",$secure = false,$httponly = false);
                        unset($_SESSION['loginErorr']);
                        include_once "view/header.php";
                        include_once "view/main.php";
                        include_once "view/footer.php";
                    
                }elseif($result_login !== 0  and $result_login !== 1  and $result_login[0]->etat === 0)  
                {   
                    $_SESSION['loginErorr'] = "<div class='alert alert-warning alert-dismissible fade show text-capitalize' role='alert'>
                    <strong>Erreur ! </strong>voter compt est inactive contacter admin pour mettre voter compt active!!!.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    // $logout = new Logout;
                    header("location: index.php");

                }else {
                    $_SESSION['loginErorr'] = "<div class='alert alert-warning alert-dismissible fade show text-capitalize' role='alert'>
                    <strong>Erreur ! </strong>Email Or Password Not Correct.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    // $logout = new Logout;
                    header("location: index.php");

                }
            }

        }  elseif(isset($_GET['forgotPass'])) {
            include_once 'view/header.php';
            include_once 'view/reset_pass/reset_pw01.php';
            include_once 'view/footer.php';

        } elseif(isset($_POST['btn_reset_pass'])) {

            $login = $_POST['reset_email'];

            $login_check = filter_var($login, FILTER_SANITIZE_EMAIL);
            $login_valid = filter_var($login, FILTER_VALIDATE_EMAIL);
            if($login_valid) {
                $_SESSION['login_v'] = $login_valid;
                $query = "select login from users where login = '$login_valid'";    
                $result_check = $this->model_obj->all_query($query, 'select');
    
                if($result_check !== 0)  {
                    unset($login);
                    include_once 'view/header.php';
                    include_once 'view/reset_pass/reset_pw02.php';
                    include_once 'view/footer.php';
                } else {
                    $_SESSION['loginErorr'] = "<h6 class='alert alert-danger text-capitalize'><i class='fa-solid fa-circle-exclamation me-2'></i>cet e-mail n'a pas encore de compte !!!</h6>";
                    include_once 'view/header.php';
                    include_once 'view/reset_pass/reset_pw01.php';
                    include_once 'view/footer.php';
                }
            }  else {
                $_SESSION['loginErorr'] = "<h6 class='alert alert-danger text-capitalize'><i class='fa-solid fa-circle-exclamation me-2'></i>invalid e-mail !!!</h6>";
                include_once 'view/header.php';
                include_once 'view/reset_pass/reset_pw01.php';
                include_once 'view/footer.php';
            }

        } elseif(isset($_POST['btn_set_new_pw'])) {
            $reset_pass = $_POST['reset_pw'];
            $reset_confirm_pw = $_POST['reset_confirm_pw'];

            $pass_filter = filter_var($reset_pass, FILTER_SANITIZE_STRING);
            $confirm_pwfilter = filter_var($reset_confirm_pw, FILTER_SANITIZE_STRING);
            
            if(strlen($pass_filter) < 8 or strlen($pass_filter) > 15) 
            {
                $_SESSION['passErorr'] = "doit être compris entre 8 et 15 caractères";

                include_once 'view/header.php';
                include_once 'view/reset_pass/reset_pw02.php';
                include_once 'view/footer.php';
    
            }elseif($pass_filter !== $confirm_pwfilter){

                $_SESSION['passErorr'] = "le mot de passe de confirmation ne correspond pas";
                include_once 'view/header.php';
                include_once 'view/reset_pass/reset_pw02.php';
                include_once 'view/footer.php';
    
            }else {
                
                $login = $_SESSION['login_v'];
                $query = "update users set pass = '$reset_pass' where login = '$login'";    
                $result_check = $this->model_obj->all_query($query, 'select');
                include_once 'view/header.php';
                include_once 'view/reset_pass/reset_pw03.php';
                include_once 'view/footer.php';
    
            } 
          
        } elseif(isset($_POST['mody_pass']) ) {

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];
            $login = $_SESSION['login']; 
            $user = $_SESSION['user']; 

            $_SESSION['alert']  = 'danger';
            $_SESSION['title']  = 'Erreur !';
            $_SESSION['icon']  = "<i class='fa-solid fa-circle-info me-2'></i>";

            $query = "select pass from users where login = '$login'";    
            $result_pass = $this->model_obj->all_query($query, 'select');

            if($result_pass !== 0 and $result_pass[0]->pass === $old_pass ) {
                if($new_pass == $confirm_pass) {
                    $query = "update users set pass = '$new_pass' where login = '$login'";    
                    $result = $this->model_obj->all_query($query, 'update');
                    if($result !== 0) {
                        $_SESSION['alert']  = 'success';
                        $_SESSION['title']  = 'Bien fait !';
                        $_SESSION['icon']  = "<i class='fa-solid fa-check me-2'></i>";
                        $_SESSION['error_msg'] = "Veuillez copier le mot de passe <b>$new_pass</b> 
                            de l'utilisateur <b>$user</b> <br>Parce qu'il est montré une fois .";
                        header("location: index.php?profile");
                    }
                    else{
                        $_SESSION['error_msg'] = "<strong>error ressayez !!!</strong>";
                        header("location: index.php?profile");
                    }
                }else {
                    $_SESSION['error_msg'] = "<b>le mot de passe de confirmer n'est pas le même</b> 
                            de l'utilisateur <b>$user</b>.";
                    header("location: index.php?profile");
                }
            }  else{
                $_SESSION['error_msg'] = "<b>Ancien Mot De Passe incorrecte !!!</b>
                    de l'utilisateur <b>$user</b>.";
                header("location: index.php?profile");

            }
        } elseif(isset($_GET['update_file'])){

            $id = intval($_GET['id']);
            $query = "SELECT * from files where id_file = $id ";
            $result = $this->model_obj->all_query($query, 'select');
            $_SESSION['result'] = $result;
            if($result !== 0 and $result !== 1) {

                $idfile = $result[0]->id_file;
                $name_file = $result[0]->name_file;
                $etage = $result[0]->etage;
                $column = $result[0]->colu_mn;
                $type = $result[0]->TYPE;
                $groupe = $result[0]->id_groupe;
                $stg = $result[0]->id_stg;
                $season = $result[0]->season;
                include_once 'view/header.php';
                include_once 'view/update.php';
                include_once 'view/footer.php';
                
            } else {
                include_once 'view/header.php';
                include_once 'view/main.php';
                include_once 'view/footer.php';
            }
        
        }elseif(isset($_POST['update'])){

            $idFile = $_POST['idFile'];
            $etage = $_POST['etage'];
            $column = $_POST['column'];

            $query = "UPDATE files set etage = '$etage', colu_mn = '$column' where id_file = $idFile";
            $result = $this->model_obj->all_query($query, 'update');

            if($result !== 0) {
                $_SESSION['alert']  = 'success';
                $_SESSION['title']  = 'Bien fait !';
                $_SESSION['icon']  = "<i class='fa-solid fa-check me-2'></i>";
                $_SESSION['error_msg'] = "Le lieu de fichier a été mis à jour avec succès.";
                include_once "view/header.php";
                include_once "view/update.php";
                include_once "view/footer.php";

                
            } else {
                $_SESSION['alert']  = 'danger';
                $_SESSION['title']  = 'erreur !';
                $_SESSION['icon']  = "<i class='fa-solid fa-check me-2'></i>";
                $_SESSION['error_msg'] = "quelque chose ne va pas, veuillez réessayer";
                include_once "view/header.php";
                include_once "view/main.php";
                include_once "view/footer.php";


            }

        } else {
            include_once "view/header.php";
            include_once "view/login.php";
            include_once "view/footer.php";
        }
    }
}