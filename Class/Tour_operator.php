<?php


class Tour_operator
{
    // Properties
    protected mixed $id;
    protected mixed $name;
    protected mixed $link;
    protected mixed $image;
    protected mixed $destinations;
    protected mixed $reviews;
    protected mixed $scores;

    public mixed $Certificate;
    // Methods


//    protected bool $is_valid; simple version !

    // constructor
    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }
    // hydrate
    public function hydrate($donnees)
    {
        $this->id = $donnees['id'];
        $this->name = $donnees['name'];
        $this->link = $donnees['link'];
        $this->image = $donnees['image'];
    }

    // GETTERS

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getGrade()
    {
        return $this->scores;
    }

    function getLink()
    {
        return $this->link;
    }

    function getImage()
    {
        return $this->image;
    }

    function getCertificate()
    {
        return $this->Certificate;
    }

    function getAllDestination()
    {
        return $this->destinations;
    }


    function getReviews()
    {
        return $this->reviews;
    }

    function getScores()
    {
        return $this->scores;
    }

    // SETTERS

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setGrade($grade)
    {
        $this->scores = $grade;
    }

    function setLink($link)
    {
        $this->link = $link;
    }

    function setImage($image)
    {
        $this->image = $image;
    }

    function setCertificate($certificate)
    {
        $this->Certificate = $certificate;
    }

    function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    function setScores($scores)
    {
        $this->scores = $scores;
    }
}

