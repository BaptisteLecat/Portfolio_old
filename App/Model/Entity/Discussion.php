<?php

namespace App\Model\Entity;

use App\Model\Entity\Profile;

class Discussion
{
    private $id;
    private $content;
    private $sender;

    public function __construct(int $id, string $content, Profile $sender) {
        $this->id = $id;
        $this->content = $content;
        $this->sender = $sender;
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
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of sender
     */ 
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the value of sender
     *
     * @return  self
     */ 
    public function setSender(Profile $sender)
    {
        $this->sender = $sender;

        return $this;
    }
}
