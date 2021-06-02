<?php

namespace App\Model\Entity;

use JsonSerializable;

class Project implements JsonSerializable
{
    private $id;
    private $title;
    private $content;
    private $thumbnail;
    private $startDate;
    private $endDate;
    private $picture;
    private $mainLink;
    private $infoLink;
    private $category;
    private $list_technology;

    public function __construct(int $id, string $title, string $content, string $thumbnail, string $startDate, string $endDate = null, string $picture, string $mainLink, string $infoLink = null, Category $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->thumbnail = $thumbnail;
        $this->startDate = $startDate;
        $this->endDate = (!is_null($endDate)) ? $endDate : "En cours";
        $this->picture = $picture;
        $this->mainLink = $mainLink;
        $this->infoLink = $infoLink;

        $this->category = $category;
        $this->list_technology = array();
    }

    public function JsonSerialize()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $this->thumbnail,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'picture' => $this->picture,
            'mainLink' => $this->mainLink,
            'infoLink' => $this->infoLink,
            'category' => $this->category->JsonSerialize(),
            'stringDate' => $this->getStringProjectDate()
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
     * Get the value of content
     */
    public function getContent($limit = 74, $break = ".")
    {
        $pad = "...";
        // return with no change if string is shorter than $limit
        if (strlen($this->content) <= $limit) return $this->content;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($this->content, $break, $limit))) {
            if ($breakpoint < strlen($this->content) - 1) {
                $string = substr($this->content, 0, $breakpoint) . $pad;
            }
        }

        return $string;
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
     * Get the value of thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set the value of thumbnail
     *
     * @return  self
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

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
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the value of mainLink
     */
    public function getMainLink()
    {
        return $this->mainLink;
    }

    /**
     * Get the value of infoLink
     */
    public function getInfoLink()
    {
        return $this->infoLink;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
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

    public function getStringProjectDate()
    {
        $string = $this->dateToString($this->startDate) . " / " . $this->dateToString($this->endDate);

        if ($this->endDate == "En cours") {
            $string = $this->endDate;
        }

        return $string;
    }

    /**
     * Permet d'afficher une date au format francais.
     * @param stringDate La string de la date.
     * @return date Date format d-m-Y: "19-02-2018".
     */
    public function dateToString($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
