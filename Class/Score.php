<?php

class Score
{
    // Properties
    protected mixed $id;
    protected mixed $value;
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

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // GETTERS

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
    public function getValue(): mixed
    {
        return $this->value;
    }


    /**
     * @return mixed
     */
    public function getAuthor(): mixed
    {
        return $this->author;
    }

    // SETTERS

    /**
     * @param mixed $author
     */
    public function setAuthor(mixed $author): void
    {
        $this->author = $author;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $value
     */
    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }
    
}