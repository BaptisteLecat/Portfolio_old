<?php

namespace App\Model\Entity;

use App\Model\Entity\Project;

class Technology
{
    private $id;
    private $label;
    private $picture;
    private $list_category;
    private $list_project;

    public function __construct(int $id, string $label, string $picture)
    {
        $this->id = $id;
        $this->label = $label;
        $this->picture = $picture;

        $this->list_category = array();
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
     * Get the value of list_Category
     */
    public function getList_Category()
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
