<?php

namespace App\Controller;

class HomeController extends MainController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadAll();
    }

    public function display()
    {
        foreach ($this->list_activity as $activity) {
            require("../templates/module/card-info.php");
        }
        require("../templates/module/discussion.php");

        foreach ($this->list_profile as $profile) {
            if($profile->getName() == "Lecat" && $profile->getFirstName() == "Baptiste"){
                require("../templates/module/profile.php");
            }
        }

        if ($this->getNbActiveSocialNetwork() > 0) {
            require("../templates/module/social-network.php");
        }

        $projectController = new ProjectController(1);
        $projectController->display();
    }

    private function getNbActiveSocialNetwork()
    {
        $nbActiveSocialNetwork = 0;
        foreach ($this->list_socialNetwork as $socialNetwork) {
            if($socialNetwork->getActive()){
                $nbActiveSocialNetwork++;
            }
        }

        return $nbActiveSocialNetwork;
    }
}
