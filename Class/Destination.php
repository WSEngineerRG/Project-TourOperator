<?php

class Destination
{
    protected mixed $id;
    protected mixed $location;
    protected mixed $price;
    protected mixed $image;
    public mixed $tour_operator;
    public mixed $certificate;

    function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate($donnees)
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
     * @return mixed
     */
    public function getImage(): mixed
    {
        return $this->image;
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

    /**
     * @param mixed $image
     */
    public function setImage(mixed $image): void
    {
        $this->image = $image;
    }

}