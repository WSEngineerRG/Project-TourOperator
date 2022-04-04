<?php

class Destination
{
    protected mixed $id;
    protected mixed $location;
    protected mixed $price;

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

    function getId()
    {
        return $this->id;
    }

    function getLocation()
    {
        return $this->location;
    }

    function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $location
     */
    public function setLocation(mixed $location): void
    {
        $this->location = $location;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(mixed $price): void
    {
        $this->price = $price;
    }

}