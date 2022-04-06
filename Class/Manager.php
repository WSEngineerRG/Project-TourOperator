<?php


class Manager
{
    private mixed $db;

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

    public function db_prepare($query)
    {
        return $this->db->prepare($query);
    }

    public function addOperator(string $name, string $link): void
    {
        $query = "INSERT INTO comparo_full.tour_operator (name, link) VALUES ('$name', '$link')";
        $this->db_query($query);
    }

    public function getAllOperator(): array
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

    public function getAllDestination(): array
    {
        $query = "SELECT * FROM comparo_full.destination GROUP BY location DESC";
        $result = $this->db_query($query);
        $destinations = [];
        while ($row = $result->fetch(\PDO::FETCH_GROUP|\PDO::FETCH_UNIQUE)) {
            $destinations[] = new Destination($row);
        }
        return $destinations;
    }

    public function getOperatorByDestination(): array
    {
        $location = $_GET['City_name'];
        $query = "SELECT * FROM comparo_full.tour_operator INNER JOIN comparo_full.destination ON comparo_full.tour_operator.id = comparo_full.destination.tour_operator_id WHERE comparo_full.destination.location='$location'";
        $results = $this->db_query($query);
        $operatorsbydestinations = [];
        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
            $destinations = new Destination($row);
            $tourOperator = new Tour_operator($row);
            $destinations->tour_operator = $tourOperator;
            $operatorsbydestinations[] = $destinations;
        }
        return $operatorsbydestinations;
    }

    public function getCertificate($id): array
    {
        $query = "SELECT * FROM comparo_full.certificate INNER JOIN  comparo_full.destination ON comparo_full.destination.tour_operator_id = comparo_full.certificate.tour_operator_id WHERE comparo_full.destination.id='$id'";
        $result = $this->db_query($query);
        $certificates = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $destinations = new Destination($row);
            $certificate = new Certificate($row);
            $destinations->certificate = $certificate;
            $certificates[] = $destinations;
        }
        return $certificates;
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

