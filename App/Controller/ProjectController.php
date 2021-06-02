<?php

namespace App\Controller;

class ProjectController extends MainController
{
    private $selectedCategory;

    public function __construct($selectedCategory = null)
    {
        parent::__construct();
        $this->loadProjectInfo();
        $this->setSelectedCategory($selectedCategory); 
    }

    public function setSelectedCategory($selectedCategory)
    {
        if(!filter_var($selectedCategory, FILTER_VALIDATE_INT)){
            $this->selectedCategory = 0;
        }else{
            if($selectedCategory < 0 || $selectedCategory > (count($this->list_category) - 1)){
                $this->selectedCategory = 0;
            }else{
                $this->selectedCategory = $selectedCategory;
            }
        }
    }

    private function loadProjectInfo(){
        $this->loadProject();
        $this->loadTechnology();
        $this->loadCategory();
    }

    public function display()
    {
        require("../templates/module/project.php");
    }

    public function technologiesForCategory(){
        return $this->list_category[$this->selectedCategory]->getList_Technology();
    }

    public function projectsForCategory(){
        $list_project = array();

        foreach ($this->list_project as $project) {
            if($project->getCategory()->getId() == $this->list_category[$this->selectedCategory]->getId()){
                array_push($list_project, $project);
            }
        }

        return $list_project;
    }

    public function getProjectFromId(int $id){
        $object = null;

        foreach ($this->list_project as $project) {
            if($project->getId() == $id){
                $object = $project;
                break;
            }
        }

        return $object;
    }
}
