<?php

include_once "ConnectionDB.php";
class Model_app extends DataBase { 
    public function all_query($query,$type) {
        try {
            $this->db_conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stat = $this->db_conx->prepare($query);
            $stat->execute();
 
            // Check query type
            $type_query = ['insert', 'update', 'delete'];
            if( in_array($type, $type_query) ) {
                if($stat) return 1;
                else return 0;

            } else   {
                $result = $stat->fetchAll(PDO::FETCH_OBJ);
                if(count($result) > 0) return $result;
                elseif(count($result) === 0) return 1;
                else return 0;
            }
           
        } catch (\Throwable $e) {
            // print("<script>alert('Error!:  ".$e->getMessage()."<br/>')</script>");
            print_r($e->getMessage());
            return $e->getMessage();
        }       
    } 
    
   
    public function includeMain() {
        include_once "view/header.php";
        include_once "view/main.php";
        include_once "view/footer.php";
    } 
    public function includeLogin(){
        include_once "view/login.php";
        include_once 'view/footer.php';

    }


}