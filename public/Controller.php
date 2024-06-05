<?php

class Controller
{
    private $css_link;
    private $js_link;
    private $title;
    private $content;

    function __construct()
    {
        $this->css_link = array("app", "cardInfo/cardInfo", "social/socialNetwork", "profile/profile", "discussion/discussion", "project/project");
        $this->js_link = array("js/script", "js/module/activity/activity_switcher","js/module/activity/index","js/module/activity/displayActivity","js/module/project/index","js/module/project/displayProject", "js/module/project/project_switcher", "js/module/project/project_info", "js/module/project/displayProjectInfo");
        $this->title = "Portfolio | Baptiste Lecat";
        $this->content = null;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMessageBox()
    {
        return $this->messageBox;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function head()
    {
        return $head = '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="description" content ="Découvrez le portfolio de Baptiste Lecat développeur alternant Web / Flutter, étudiant en Bac +3 Devops au sein de l\'EPSI et titulaire d\'un BTS SIO">
        <meta name ="keywords" lang ="fr" content ="baptiste, lecat, bts sio, slam, developpeur, etudiant, alternance, web, epsi, carcouet">
        <meta name="Copyright" content="© Copyright Baptiste Lecat - 2020">
        <meta name="Author" content="Baptiste Lecat">
        <meta name="category" content ="portfolio">
        <meta name="robots" content="index, follow">
        <meta name="distribution" content="global">
        <meta name="revisit-after" content="15 day">
        <meta name="generator" content="VSCode, Figma, PHPMyAdmin">
        <meta name="Identifier-Url" content="https://portfolio.baptistelecat-dev.fr">
        <meta name="Reply-To" content="baptiste(dot)lecat44(at)gmail(dot)fr">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../assets/img/LogoBaptiste.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <base href="http://localhost:3004"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>'
            .$this->loadcss_link().
            '<title>' . $this->title . '</title>
        </head>
        <body>';
    }

    public function footer()
    {
        return $footer =
            $this->loadjs_link().
            '</body>

        </html>';
    }

    private function loadcss_link()
    {
        $html_link = "";
        foreach ($this->css_link as $css) {
            $html_link .= '<link rel="stylesheet" href="assets/css/' . $css . '.css">';
        }
        return $html_link;
    }

    private function loadjs_link()
    {
        $html_link = "";
        foreach ($this->js_link as $js) {
            $html_link .= '<script src="'.$js.'.js"></script>';
        }
        return $html_link;
    }
}
