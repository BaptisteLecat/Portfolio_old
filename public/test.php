<?php

require_once '../vendor/autoload.php';

use App\Model\Entity\Technology;
use App\Model\Manager\ActivityManager;
use App\Model\Manager\CategoryManager;
use App\Model\Manager\DiscussionManager;
use App\Model\Manager\ProfileManager;
use App\Model\Manager\ProjectManager;
use App\Model\Manager\SocialNetworkManager;
use App\Model\Manager\TechnologyManager;

//Load Technology
/*$list_technology = TechnologyManager::selectTechnology();
TechnologyManager::loadCategoryForTechnology($list_technology[0]);
var_dump($list_category[0]);*/

//Load Category
/*$list_category = CategoryManager::selectCategory();
CategoryManager::loadTechnologyForCategory($list_category[0]);
CategoryManager::loadProjectForCategory($list_category[0]);
var_dump($list_category[0]);*/

//Load Activity
/*$list_activity = ActivityManager::selectActivity();
var_dump($list_activity);*/

//Load Discussion
/*$list_discussion = DiscussionManager::selectDiscussion();
var_dump($list_discussion);*/

//Load Profile
/*$list_profile = ProfileManager::selectProfile();
var_dump($list_profile);*/

//Load Project
/*$list_project = ProjectManager::selectProject();
ProjectManager::loadTechnologyForProject($list_project[0]);
var_dump($list_project);*/

//Load SocialNetwork
$list_socialNetwork = SocialNetworkManager::selectSocialNetwork();
var_dump($list_socialNetwork);