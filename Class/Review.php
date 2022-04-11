<?php

class Review
{
    protected mixed $id;
    protected mixed $message;
    protected mixed $send_at;
    protected mixed $author_id;
    protected mixed $tour_operator_id;
    public mixed $Author;

    function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMessage(): mixed
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getSendAt(): mixed
    {
        return $this->send_at;
    }

    /**
     * @return mixed
     */
    public function getAuthorId(): mixed
    {
        return $this->author_id;
    }


    public function getOperatorId(): mixed
    {
        return $this->tour_operator_id;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $message
     */
    public function setMessage(mixed $message): void
    {
        $this->message = $message;
    }

    /**
     * @param mixed $send_at
     */
    public function setSend_at(mixed $send_at): void
    {
        $this->send_at = $send_at = date("F j, Y, g:i a");
    }

    /**
     * @param mixed $author
     */
    public function setAuthorId(mixed $author): void
    {
        $this->author_id = $author;
    }


    /**
     * @return mixed
     */
    public function setTour_operator_id($tour_operator_id): void
    {
        $this->tour_operator_id = $tour_operator_id;
    }
}