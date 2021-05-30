<?php 

namespace App\Model\Entity;

use JsonSerializable;

class Activity implements JsonSerializable
{
    private $id;
    private $title;
    private $date;
    private $picture;

    public function __construct(int $id, string $title, string $date, string $picture) {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->picture = $picture;
    }

    public function JsonSerialize()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'picture' => $this->picture
        );
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}
