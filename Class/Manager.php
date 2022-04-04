<?php

class Manager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function hydrate($db)
    {
        $this->db = $db;
    }



    public function db_query(string $query)
    {
        return $this->db->query($query);
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
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $operators[] = new Tour_operator($row);
        }
        return $operators;
    }

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

    /**
     * @param mixed $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }
}

