<?php

use App\Controller\ProjectController;

require_once("../../../../vendor/autoload.php");

try {
    $html = null;

    if (isset($_POST["category"])) {
        if (is_numeric($_POST["category"])) {
            $category = $_POST["category"];
            $projectController = new ProjectController($category);
            $list_project = $projectController->projectsForCategory();
            $list_technology = $projectController->technologiesForCategory();
        }
    }


} catch (Exception $e) {
    throw new Exception($e->getMessage());
}

$response = ["list_project" => $list_project, "list_technology" => $list_technology];
echo json_encode($response);