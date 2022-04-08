<?php

class Certificate
{
    // Properties
    protected mixed $id;
    protected mixed $value;
    protected mixed $author;
    protected mixed $expireAt;
    protected mixed $signatory;


    function _construct(array $donnees)
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

    /**
     * @return mixed
     */
    public function getExpireAt(): mixed
    {
        return $this->expireAt;
    }

    /**
     * @return mixed
     */
    public function getSignatory(): mixed
    {
        return $this->signatory;
    }

    // SETTERS

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

    /**
     * @param mixed $author
     */
    public function setAuthor(mixed $author): void
    {
        $this->author = $author;
    }

    /**
     * @param mixed $expireAt
     */
    public function setExpireAt(mixed $expireAt): void
    {
        $this->expireAt = $expireAt;
    }

    /**
     * @param mixed $signatory
     */
    public function setSignatory(mixed $signatory): void
    {
        $this->signatory = $signatory;
    }

}