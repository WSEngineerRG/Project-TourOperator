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

    public function addOperator($name, $link): void
    {
        $query = "INSERT INTO comparo_full.tour_operator (`name`, `link`, `id`) VALUES (?,?,?)";
        $this->db_prepare($query)->execute([$name, $link, $this->db->lastInsertId()]);
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

    public function addDestination($location, $price, $id, $image): void
    {
        $query = "INSERT INTO comparo_full.destination (`location`, `price`, `tour_operator_id`, `image`) VALUES (?,?,?,?)";
        $this->db_prepare($query)->execute([$location, $price, $id, $image]);
    }

    public function addReview($message, $id, $author_id): void
    {
        $query = "INSERT INTO comparo_full.review (`message`, `tour_operator_id`, `author_id`) VALUES (?,?,?)";
        $this->db_prepare($query)->execute([$message, $id, $author_id['id']]);
    }

    public function getAllDestination(): array
    {
        $query = "SELECT * FROM comparo_full.destination GROUP BY location DESC ORDER BY id ASC";
        $result = $this->db_query($query);
        $destinations = [];
        while ($row = $result->fetch(\PDO::FETCH_GROUP|\PDO::FETCH_UNIQUE)) {
            $destinations[] = new Destination($row);
        }
        return $destinations;
    }

    public function getReviews($id): array
    {
        $query = "SELECT * FROM comparo_full.review INNER JOIN comparo_full.author ON comparo_full.review.author_id = comparo_full.author.id WHERE comparo_full.review.tour_operator_id='$id'";
        $result = $this->db_query($query);
        $reviews = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $review = new Review($row);
            $author = new Author($row);
            $review->Author = $author;
            $reviews[] = $review;
        }
        return $reviews;
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

    public function getSearch(): array
    {
        $search = $_GET['search'];
        $query = "SELECT * FROM comparo_full.destination WHERE location  LIKE '%$search%' GROUP BY location DESC";
        $result = $this->db_query($query);
        $destinations = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $destinations[] = new Destination($row);
        }
        return $destinations;
    }

    public function getAuthorByName($name)
    {
        $query = "SELECT id FROM comparo_full.author WHERE name='$name'";
        $result = $this->db_query($query);
        return $result->fetch(PDO::FETCH_ASSOC);
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

    public function countReviews(): int
    {
        $query = "SELECT COUNT(*) FROM comparo_full.review";
        $result = $this->db_query($query);
        $row = $result->fetch();
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

