<?php

use App\Controller\ActivityController;

require_once("../../../../vendor/autoload.php");

try {
    $html = null;

    if (isset($_POST["selectedCourse"])) {
        if (is_numeric($_POST["selectedCourse"])) {
            $selectedCourse = $_POST["selectedCourse"];
            $activityController = new ActivityController(null, $selectedCourse);
            $activity = $activityController->getCourseObject();
            $index = $activityController->getSelectedCourseIndex();
        }
    }else{
        if (isset($_POST["selectedExperience"])) {
            if (is_numeric($_POST["selectedExperience"])) {
                $selectedExperience = $_POST["selectedExperience"];
                $activityController = new ActivityController($selectedExperience, null);
                $activity = $activityController->getExperienceObject();
                $index = $activityController->getSelectedExperienceIndex();
            }
        }
    }


} catch (Exception $e) {
    throw new Exception($e->getMessage());
}

$response = ["activity" => $activity, "index" => $index];
echo json_encode($response);