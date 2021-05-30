<?php

namespace App\Controller;

class ActivityController extends MainController
{
    private $selectedExperience;
    private $selectedCourse;

    private $list_course;
    private $list_experience;

    public function __construct($selectedExperience = null, $selectedCourse = null)
    {
        parent::__construct();
        $this->loadActivity();
        $this->list_course = $this->getList_Course();
        $this->list_experience = $this->getList_Experience();
        $this->setSelectedExperience($selectedExperience);
        $this->setSelectedCourse($selectedCourse);
    }

    public function getSelectedExperienceIndex()
    {
        return $this->selectedExperience;
    }

    public function getSelectedCourseIndex()
    {
        return $this->selectedCourse;
    }

    public function getExperienceObject()
    {
        return $this->getList_Experience()[$this->selectedExperience];
    }

    public function getCourseObject()
    {
        return $this->getList_Course()[$this->selectedCourse];
    }

    public function setSelectedExperience($selectedExperience)
    {
        if (!filter_var($selectedExperience, FILTER_VALIDATE_INT)) {
            $this->selectedExperience = 0;
        } else {
            if ($selectedExperience > (count($this->list_experience) - 1)) {
                $this->selectedExperience = 0;
            } else {
                if ($selectedExperience < 0) {
                    $this->selectedExperience = (count($this->list_experience) - 1);
                } else {
                    $this->selectedExperience = $selectedExperience;
                }
            }
        }
    }

    public function setSelectedCourse($selectedCourse)
    {
        if (!filter_var($selectedCourse, FILTER_VALIDATE_INT)) {
            $this->selectedCourse = 0;
        } else {
            if ($selectedCourse > (count($this->list_course) - 1)) {
                $this->selectedCourse = 0;
            } else {
                if ($selectedCourse < 0) {
                    $this->selectedCourse = (count($this->list_course) - 1);
                } else {
                    $this->selectedCourse = $selectedCourse;
                }
            }
        }
    }

    public function display()
    {
        $this->displayCourse();
        $this->displayExperience();
    }

    private function displayCourse()
    {
        if (count($this->list_course) > 0) {
            $activity = $this->list_course[$this->selectedCourse];
            $index = $this->getSelectedCourseIndex();
            require($_SERVER['DOCUMENT_ROOT'] . "/../templates/module/card-info.php");
        }
    }

    private function displayExperience()
    {
        if (count($this->list_experience) > 0) {
            $activity = $this->list_experience[$this->selectedExperience];
            $index = $this->getSelectedExperienceIndex();
            require($_SERVER['DOCUMENT_ROOT'] . "/../templates/module/card-info.php");
        }
    }

    private function getList_Course()
    {
        $list_course = array();
        foreach ($this->list_activity as $activity) {
            if ($activity->getInstanceName() == "Course") {
                array_push($list_course, $activity);
            }
        }

        return $list_course;
    }

    private function getList_Experience()
    {
        $list_experience = array();
        foreach ($this->list_activity as $activity) {
            if ($activity->getInstanceName() == "Experience") {
                array_push($list_experience, $activity);
            }
        }

        return $list_experience;
    }
}
