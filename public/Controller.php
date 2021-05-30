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
        $this->js_link = array("js/script", "js/module/activity/activity_switcher","js/module/activity/index", "js/module/activity/displayActivity");
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../assets/img/LogoBaptiste.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
            <base href="http://portfolio"/>'
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
