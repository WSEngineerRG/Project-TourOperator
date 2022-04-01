<?php

class destination
{
    public string $classname = "destination";
    protected mixed $id;
    protected mixed $location;
    protected mixed $price;

    function __construct($data)
    {
        $this->id = $data['id'];
        $this->location = $data['location'];
        $this->price = $data['price'];
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

}