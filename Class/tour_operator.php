<?php


class tour_operator
{
    public string $classname = 'tour_operator';
    protected mixed $id;
    protected mixed $name;
    protected mixed $link;
    protected mixed $certificate;
    protected mixed $destinations;
    protected mixed $reviews;
    protected mixed $scores;

    protected bool $is_valid;


    function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->link = $data['link'];
        $this->certificate = $data['certificate'];
        $this->destinations = $data['destinations'];
        $this->reviews = $data['reviews'];
        $this->scores = $data['scores'];
        $this->is_valid = true;
    }

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

    function isPremium(): bool
    {
        return $this->is_valid;
    }
}

