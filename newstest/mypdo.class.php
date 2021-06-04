<?php
class mypdo{
    private $type;
    private $host;
    private $port;
    private $dbname;
    private $charset;
    private $user;
    private $pwd;
    private $pdo;
    private static $instance;
    private function __construct($param){
        $this->initparam($param);
        $this->initPDO();
        $this->initException();
    }
    private function __clone()
    {
    }
    public static function getInstance($param=array())
    {
        if(!self::$instance instanceof self){
            self::$instance=new self($param);
        }
        return self::$instance;
    }
    private function initparam($param){
        $this->type=$param["type"]??"mysql";
        $this->host=$param["host"]??"127.0.0.1";
        $this->port=$param["port"]??"3306";
        $this->dbname=$param["dbname"]??"data";
        $this->charset=$param["charset"]??"utf8";
        $this->user=$param["user"]??"root";
        $this->pwd=$param["pwd"]??"123456";
    }
    private function initPDO(){
        try {
            $dsn="{$this->type}:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}";
            $this->pdo=new PDO($dsn,$this->user,$this->pwd);
        }
        catch (PDOException $ex){
            $this->showException($ex);
            exit;
        }
    }
    private  function initException(){
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    private function showException($ex){
        echo "error code:".$ex->getCode()."<br>";
        echo "error message:".$ex->getMessage();
    }
    public function exec($sql){
        try{
        return $this->pdo->exec($sql)    ;
}
            catch(PDOException $ex){
            $this->showException($ex);
            exit;
            }
    }
	public function fetchall($sql){
        try {
            $stms= $this->pdo->query($sql);
            return $result=$stms->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $ex){
            $this->showException($ex);
        }
    }
}
//$param=array();
//$testmy=test_my::getInstance($param);
//$dd=$testmy->fetchall("select * from news");
//$result=$testmy->fetchall("select * from news");