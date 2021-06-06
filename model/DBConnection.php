<?php
namespace Model;

class DBConnection
{
    public $dsn;
    public $use;
    public $password;

    public function __construct($dsn,$use,$password){
        $this->dsn =$dsn;
        $this->use = $use;
        $this->password = $password;
    }
    public function connect() : \PDO
    {
        return new \PDO($this->dsn,$this->use,$this->password);
    }
}