<?php

class certificate
{
    public string $classname = "certificate";
    protected mixed $id;
    protected mixed $value;
    protected mixed $author;
    protected mixed $expireAt;
    protected mixed $signatory;

    function _construct($data){
        $this->id = $data['id'];
        $this->value = $data['value'];
        $this->author = $data['author'];
    }

    function getExpireAt(){
        return $this->expireAt;
    }

    function getSignatory(){
        return $this->signatory;
    }

}