<?php


class DataBase
{
    private $db_name = 'doc_sys';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_host = 'localhost';
    private $db_type = 'mysql';
    private $db_port = '3306';
    protected $db_conx;

    public function __construct() {
        try  {
            $string_conx = $this->db_type.":host=".$this->db_host.";dbname=".$this->db_name;
            $this->db_conx = new PDO($string_conx, $this->db_user,$this->db_pass);

        }
        catch (PDOException $e) {
            print("<script>alert('Error!:  ".$e->getMessage()."<br/>')</script>");
            die();
        }
    }
}
