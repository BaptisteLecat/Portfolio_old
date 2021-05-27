<?php

namespace App\Controller;

use App\Model\Manager\ActivityManager;
use App\Model\Manager\CategoryManager;
use App\Model\Manager\DiscussionManager;
use App\Model\Manager\ProfileManager;
use App\Model\Manager\ProjectManager;
use App\Model\Manager\SocialNetworkManager;
use App\Model\Manager\TechnologyManager;

class MainController
{
    protected $list_technology;
    protected $list_category;
    protected $list_activity;
    protected $list_discussion;
    protected $list_profile;
    protected $list_project;
    protected $list_socialNetwork;

    protected $content;

    public function __construct()
    {
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function addContent(string $content)
    {
        $this->content .= $content;
    }

    public function loadAll()
    {
        $this->loadTechnology();
        $this->loadCategory();
        $this->loadActivity();
        $this->loadDiscussion();
        $this->loadProfile();
    }

    public function loadTechnology()
    {
        $this->list_technology = TechnologyManager::selectTechnology();
        foreach ($this->list_technology as $technology) {
            TechnologyManager::loadCategoryForTechnology($technology);
        }
    }

    public function loadCategory()
    {
        $this->list_category = CategoryManager::selectCategory();
        foreach ($this->list_category as $category) {
            CategoryManager::loadTechnologyForCategory($category);
            CategoryManager::loadProjectForCategory($category);
        }
    }

    public function loadActivity()
    {
        $this->list_activity = ActivityManager::selectActivity();
    }

    public function loadDiscussion()
    {
        $this->list_discussion = DiscussionManager::selectDiscussion();
    }

    public function loadProfile()
    {
        $this->list_profile = ProfileManager::selectProfile();
    }

    public function loadProject()
    {
        $this->list_project = ProjectManager::selectProject();
        foreach ($this->list_project as $project) {
            ProjectManager::loadTechnologyForProject($project);
        }
    }

    public function loadSocialNetwork()
    {
        $this->list_socialNetwork = SocialNetworkManager::selectSocialNetwork();
    }
}
