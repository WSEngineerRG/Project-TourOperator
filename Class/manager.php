<?php

class manager
{
    public string $classname = 'manager';
    public mixed $data;
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'comparo_full';

    public function __construct()    // Constructor
    {
        $this->data = new mysqli(self::DB_HOSTNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
        if ($this->data->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->data->connect_errno . ") " . $this->data->connect_error;
        }
    }
    public function db_connect(): mysqli
    {
       return $this->data;
    }
}

$manager = new manager();

