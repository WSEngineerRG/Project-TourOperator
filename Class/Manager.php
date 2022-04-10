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

    //Count the number of rows in a table

    public function countOperator(): int
    {
        $query = "SELECT COUNT(*) FROM comparo_full.tour_operator";
        $result = $this->db_query($query);
        $row = $result->fetch();
        return $row[0];
    }

    public function countPremiumOperator()
    {
        // $query = "SELECT COUNT(*) FROM comparo_full.tour_operator WHERE is_premium = 1"; Old method !
        $query = "SELECT COUNT(*) FROM comparo_full.tour_operator where id = comparo_full.certificate.tour_operator_id";
        $result = $this->db_query($query);
        $row = $result->fetch();
        return $row[0];
    }

    public function countDestination(): int
    {
        $query = "SELECT COUNT(*) FROM comparo_full.destination";
        $result = $this->db_query($query);
        $row = $result->fetch();
        return $row[0];
    }

    public function countReviews(): int
    {
        $id = $_GET['id'];
        $query = "SELECT COUNT(*) FROM comparo_full.review WHERE comparo_full.review.tour_operator_id = $id";
        $result = $this->db_query($query);
        $row = $result->fetch();
        return $row[0];
    }




    //Options
    public function ifAuthorExist($name)
    {
        $query = "SELECT * FROM comparo_full.author WHERE name = '$name'";
        $result = $this->db_query($query);
        $results = $result->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * @param mixed $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }

    //Add
    public function addOperator($name, $link): void
    {
        $query = "INSERT INTO comparo_full.tour_operator (`name`, `link`, `id`) VALUES (?,?,?)";
        $this->db_prepare($query)->execute([$name, $link, $this->db->lastInsertId()]);
    }

    public function addDestination($location, $price, $id, $image): void
    {
        $query = "INSERT INTO comparo_full.destination (`location`, `price`, `tour_operator_id`, `image`) VALUES (?,?,?,?)";
        $this->db_prepare($query)->execute([$location, $price, $id, $image]);
    }

    public function addReview($message, $id, $author_id): void
    {
        $query = "INSERT INTO comparo_full.review (`message`, `tour_operator_id`, `author_id`) VALUES (?,?,?)";
        $this->db_prepare($query)->execute([$message, $id, $author_id]);
    }

    public function addCertificate($id, $date, $sign): void
    {
        $query = "INSERT INTO comparo_full.certificate (`tour_operator_id`, `expires_at`, `signatory`) VALUES (?,?,?)";
        $this->db_prepare($query)->execute([$id, $date, $sign]);
    }

    public function addScore($id, $score, $author_id): void
    {
        $query = "INSERT INTO comparo_full.score (`value`, `author_id`) VALUES ($score, $author_id) WHERE tour_operator_id = $id";
        $this->db_prepare($query);
    }

    //Get
    public function getSendAtById($id)
    {
        $query = "SELECT comparo_full.review.send_at FROM comparo_full.review WHERE id = $id";
        $result = $this->db_query($query);
        $results = $result->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getOperatorById($id)
    {
        $query = "SELECT * FROM comparo_full.tour_operator WHERE id = $id";
        $result = $this->db_query($query);
        $results = $result->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getDestinationById($id)
    {
        $query = "SELECT * FROM comparo_full.destination WHERE id = $id";
        $result = $this->db_query($query);
        $results = $result->fetch(PDO::FETCH_ASSOC);
        return $results;
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

    public function getScore()
    {
        $query = "SELECT * FROM comparo_full.score";
        $result = $this->db_query($query);
        $scores = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $scores[] = new Score($row);
        }
        return $scores;
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

    public function getScoreById($id): array
    {
        $query = "SELECT * FROM comparo_full.score INNER JOIN comparo_full.author ON comparo_full.score.author_id = comparo_full.author.id WHERE comparo_full.score.tour_operator_id='$id')";
        $result = $this->db_query($query);
        $scores = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $score = new Score($row);
            $author = new Author($row);
            $score->Author = $author;
            $scores[] = $score;
        }
        return $scores;
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
        $query = "SELECT * FROM comparo_full.certificate INNER JOIN  comparo_full.tour_operator ON comparo_full.tour_operator.id = comparo_full.certificate.tour_operator_id WHERE comparo_full.tour_operator.id='$id'";
        $result = $this->db_query($query);
        $certificates = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tour_operator = new Tour_operator($row);
            $certificate = new Certificate($row);
            $tour_operator->Certificate = $certificate;
            $certificates[] = $tour_operator;
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


    //Update

    public function updateOperatorById($id, $name, $link, $image)
    {
        $query = "UPDATE comparo_full.tour_operator SET comparo_full.tour_operator.name = '$name', comparo_full.tour_operator.link = '$link', comparo_full.tour_operator.image = '$image' WHERE comparo_full.tour_operator.id = $id";
        $result = $this->db_query($query);
        return $result;
    }

    public function updateDestinationById($id, $location, $price, $operator_id, $image)
    {
        $query = "UPDATE comparo_full.destination SET comparo_full.destination.location = '$location', comparo_full.destination.price = '$price', comparo_full.destination.tour_operator_id = '$operator_id', comparo_full.destination.image = '$image' WHERE comparo_full.destination.id = $id";
        $result = $this->db_query($query);
        return $result;
    }

    //Delete

    public function deleteOperatorById($id)
    {
        $query = "DELETE FROM comparo_full.tour_operator WHERE id = $id";
        $result = $this->db_query($query);
        var_dump($result);
        die;
        return $result;
    }

}

