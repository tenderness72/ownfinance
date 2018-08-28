<?php
//$color_list = array()
class DB{
    public $USER = 'finance';
    public $PW = 'Finance10+*';
    public $dnsinfo = "mysql:dbname=finance;host=localhost;charset=utf8";

    public function Connectdb(){
        try{
            $pdo = new PDO($this->dnsinfo,$this->USER,$this->PW);
            return $pdo;
        }catch(Exception $e){
            return false;
        }
    }
    public function executeSQL($sql,$array){
        try{
            if(!$pdo = $this->Connectdb())return false;
            $stmt = $pdo->prepare($sql);
            $stmt->execute($array);
            return $stmt;
        }catch(Exception $e){
            return false;
        }
    }
}
?>
