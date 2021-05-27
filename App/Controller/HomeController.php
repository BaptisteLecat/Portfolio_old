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
    }
}
