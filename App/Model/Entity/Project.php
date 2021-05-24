<?php 

namespace App\Model\Entity;

class Project
{
    private $id;
    private $title;
    private $content;
    private $picture;
    private $startDate;
    private $endDate;
    private $list_category;
    private $list_technology;

    public function __construct(int $id, string $title, string $content, string $picture, string $startDate, string $endDate = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->picture = $picture;
        $this->startDate = $startDate;
        $this->endDate = (!is_null($endDate)) ? $endDate : "En cours";

        $this->list_category = array();
        $this->list_technology = array();
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

    /**
     * Get the value of startDate
     */ 
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */ 
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of endDate
     */ 
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */ 
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of list_category
     */ 
    public function getList_category()
    {
        return $this->list_category;
    }

    /**
     * Add a category to the current list.
     *
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        array_push($this->list_category, $category);
    }

    /**
     * Remove a category from the current list.
     *
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        unset($this->list_category[array_search($category, $this->list_category)]);
    }

    /**
     * Get the value of list_technology
     */ 
    public function getList_technology()
    {
        return $this->list_technology;
    }

    /**
     * Add a technology to the current list.
     *
     * @param Technology $technology
     */
    public function addTechnology(Technology $technology)
    {
        array_push($this->list_technology, $technology);
    }

    /**
     * Remove a technology from the current list.
     *
     * @param Technology $technology
     */
    public function removeTechnology(Technology $technology)
    {
        unset($this->list_technology[array_search($technology, $this->list_technology)]);
    }
}
