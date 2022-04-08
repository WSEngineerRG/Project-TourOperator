<?php

class Author
{
    protected mixed $id;
    protected mixed $name;
    protected mixed $created_at;

    // constructor
    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    // hydrate

    public function hydrate($donnes)
    {
        foreach ($donnes as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
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
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(): mixed
    {
        return $this->created_at;
    }


    // Setters
    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName(mixed $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreated_at(mixed $created_at): void
    {
        $this->created_at = $created_at;
    }


}