<?php

class review
{

    protected mixed $id;
    protected mixed $message;
    protected mixed $author;

    function __construct($data)
    {
        $this->id = $data['id'];
        $this->message = $data['message'];
        $this->author = $data['author'];
    }

    function getId()
    {
        return $this->id;
    }

    function getVAlue()
    {
        return $this->message;
    }

    function getAuthor()
    {
        return $this->author;
    }
}