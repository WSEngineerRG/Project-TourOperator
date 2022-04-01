<?php

class Manager
{
    public string $classname = 'Manager';
    public mixed $data;
//    public string $name;
//    public string $link;
//    public string $location;
//    public string $price;
    protected mixed $id;
    protected mixed $name;
    protected mixed $link;
    protected mixed $certificate;
    protected mixed $destinations;
    protected mixed $reviews;
    protected mixed $scores;
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'comparo_full';

    public function __construct($data)    // Constructor
    {
        $this->data = new mysqli(self::DB_HOSTNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
        if ($this->data->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->data->connect_errno . ") " . $this->data->connect_error;
        }
        $this->hydrate($data);
//        $this->name = $_POST['name'];
//        $this->link = $_POST['link'];
//        $this->location = $_POST['location'];
//        $this->price = $_POST['price'];
    }

    private function hydrate($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->link = $data['link'];
        $this->certificate = $data['certificate'];
        $this->destinations = $data['destinations'];
        $this->reviews = $data['reviews'];
        $this->scores = $data['scores'];
    }

    public function db_connect(): mysqli
    {
       return $this->data;
    }

    public function db_close(): void
    {
        $this->data->close();
    }

    public function db_query(string $query): mysqli_result
    {
        return $this->data->query($query);
    }

    public function addOperator(string $name, string $link): void
    {
        $query = "INSERT INTO comparo_full.tour_operator (name, link) VALUES ('$name', '$link')";
        $this->db_query($query);
    }

    public function getOperators(): array
    {
        $query = "SELECT * FROM comparo_full.tour_operator";
        $result = $this->db_query($query);
        $operators = [];
        while ($row = $result->fetch_assoc()) {
            $operators[] = $row;
        }
        return $operators;
    }
//    public function getOperators()
//    {
//        $query = "SELECT * FROM comparo_full.tour_operator";
//        $this->db_query($query);
//    }

    public function addDestination(string $location, string $price): void
    {
        $query = "INSERT INTO comparo_full.destination (location, price) VALUES ('$location', '$price')";
        $this->db_query($query);
    }

    public function getDestinations(): array
    {
        $query = "SELECT * FROM comparo_full.destination";
        $result = $this->db_query($query);
        $destinations = [];
        while ($row = $result->fetch_assoc()) {
            $destinations[] = $row;
        }
        return $destinations;
    }

    public function countOperator(): int
    {
        $query = "SELECT COUNT(*) FROM comparo_full.tour_operator";
        $result = $this->db_query($query);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function countPremiumOperator()
    {
        // $query = "SELECT COUNT(*) FROM comparo_full.tour_operator WHERE is_premium = 1"; Old method !
        $query = "SELECT COUNT(*) FROM comparo_full.tour_operator where id = comparo_full.certificate.tour_operator_id";
        $result = $this->db_query($query);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function countDestination(): int
    {
        $query = "SELECT COUNT(*) FROM comparo_full.destination";
        $result = $this->db_query($query);
        $row = $result->fetch_row();
        return $row[0];
    }

}



$manager = new manager();

