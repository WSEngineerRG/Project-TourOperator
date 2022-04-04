<?php

class Review
{
    protected mixed $id;
    protected mixed $message;
    protected mixed $author;

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
    public function getAuthor(): mixed
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getMessage(): mixed
    {
        return $this->message;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor(mixed $author): void
    {
        $this->author = $author;
    }

    /**
     * @param mixed $message
     */
    public function setMessage(mixed $message): void
    {
        $this->message = $message;
    }
}