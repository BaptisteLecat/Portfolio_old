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
        $activityController = new ActivityController(1);
        $activityController->display();
        
        require("../templates/module/discussion.php");
        ob_end_clean();
        
        
        foreach ($this->list_profile as $profile) {
            if($profile->getName() == "Lecat" && $profile->getFirstName() == "Baptiste"){
                require("../templates/module/profile.php");
                ob_end_clean();
            }
        }
        
        if ($this->getNbActiveSocialNetwork() > 0) {
            require("../templates/module/social-network.php");
            ob_end_clean();
        }
        
        flush();
        $projectController = new ProjectController(0);
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
