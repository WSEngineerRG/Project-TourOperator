<?php

class score
{
    public string $classname = "score";
    protected mixed $id;
    protected mixed $value;
    protected mixed $author;


    function __construct($data){
        $this->id = $data['id'];
        $this->value = $data['value'];
        $this->author = $data['author'];
    }
    
    function getId($data)
    {
        return $this->id;
    }

    function getValue()
    {
        return $this->value;
    }

    function getAuthor()
    {
        return $this->author;
    }
    
}