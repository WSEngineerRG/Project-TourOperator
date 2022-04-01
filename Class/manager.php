<?php

class manager
{
    public string $classname = 'manager';
    public mixed $db;
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'comparo_full';

    public function __construct()    // Constructor
    {
        $this->db = new mysqli(self::DB_HOSTNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }
    }
    public function db_connect(){
       return $this->db;
    }
}

$manager = new manager();

