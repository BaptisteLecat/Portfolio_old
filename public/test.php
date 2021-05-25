<?php

require_once '../vendor/autoload.php';

use App\Model\Entity\Technology;
use App\Model\Manager\CategoryManager;
use App\Model\Manager\TechnologyManager;

//Load Technology
$list_technology = TechnologyManager::selectTechnology();
TechnologyManager::loadCategoryForTechnology($list_technology[0]);

//Load Category
$list_category = CategoryManager::selectCategory();
CategoryManager::loadTechnologyForCategory($list_category[0]);