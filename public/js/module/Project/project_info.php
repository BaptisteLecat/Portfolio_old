<?php

use App\Controller\ProjectController;

require_once("../../../../vendor/autoload.php");

try {
    $html = null;
    $project = null;

    if (isset($_POST["projectId"])) {
        if (is_numeric($_POST["projectId"])) {
            $projectId = $_POST["projectId"];
            $projectController = new ProjectController();
            $project = $projectController->getProjectFromId($projectId);
        }
    }


} catch (Exception $e) {
    throw new Exception($e->getMessage());
}

$response = ["project" => $project];
echo json_encode($response);