<?php

namespace App\Model\Entity;

use App\Model\Entity\Project;
use App\Model\Entity\Technology;

class Category
{
    private $id;
    private $label;
    private $picture;
    private $list_technology;
    private $list_project;

    public function __construct(int $id, string $label, string $picture) {
        $this->id = $id;
        $this->label = $label;
        $this->picture = $picture;

        $this->list_technology = array();
        $this->list_project = array();
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
     * Get the value of label
     */ 
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */ 
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
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
     * Get the value of list_technology
     */ 
    public function getList_Technology()
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

    /**
     * Get the value of list_project
     */ 
    public function getList_project()
    {
        return $this->list_project;
    }

    /**
     * Add a project to the current list.
     *
     * @param Project $project
     */
    public function addProject(Project $project)
    {
        array_push($this->list_project, $project);
    }

    /**
     * Remove a project from the current list.
     *
     * @param Project $project
     */
    public function removeProject(Project $project)
    {
        unset($this->list_project[array_search($project, $this->list_project)]);
    }
}
