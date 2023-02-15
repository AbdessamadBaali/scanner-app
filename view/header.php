<?php

 include_once 'model/Model.php';
 $model_obj = new Model_app();
 if (isset($_SESSION['login']))
 {
     $user = $_SESSION['user'];
     $login = $_SESSION['login'];
     $avatar = $model_obj->all_query("SELECT avatar FROM users where login = '$login'; ", "select") ;
 }

?>

<header class='d-flex'>
        <a href='index.php?dashboard' class='border-0 logo text-decoration-none'>
        <img src='images/icon/icon.png' width='35px' heigth='35px' alt='' srcset=''>
        DOCS-SCANNER</a>
        <nav>
            <div class='m-0'>
                <?php  
                    if(isset($_SESSION['login']))  {
                        echo " <div class='dropdown'>
                        <a class='dropdown-toggle text-white text-uppercase text-decoration-none' type='button' data-bs-toggle='dropdown' aria-expanded='false'href='#'>
                        <img width='40' height='40' class='profile-img' src=";
                        if($avatar !== 0) echo $avatar[0]->avatar;
                        echo " alt='avatar'><span class='mx-2'>".$_SESSION['typeUser']."<span></a>
                                                
                        <ul class='dropdown-menu'>
                            <li class='dropdown-item'>
                                    <a href='index.php?profile'>
                                        <i class='fa fa-fw fa-gear'></i> 
                                    Settings</a>
                                </li>
                                <li class='divider'></li>
                                <li class='dropdown-item'>
                                    <a href='index.php?Logout'>
                                    <i class='fa fa-fw fa-power-off'></i> 
                                    Log Out</a>
                                </li>
                        </ul>
                    </div>";

                } elseif(isset($_GET['forgotPass']) or isset($_POST['btn_reset_pass']) or  isset($_POST['btn_set_new_pw']))
                {
                    echo "
                        <li>
                            <a class='nav-link link-header' href='index.php'>Login</a>
                        </li>";
                }?>
                
            </div>
        </nav>
</header>