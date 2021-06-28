<?php

require_once __DIR__ . '/Template.php';

class AppController
{
    /**
     * @return string
     */
    public function hello(): string
    {
        $template = new Template(__DIR__ . '/../templates/hello.tpl.php');
        $template->setVar('name', $_GET['name']);
        $template->setVar('lastName', 'Bar');

        // compiler le fichier .tpl vers du HTML
        return $template->render();
        return '<h1>Hello ' . $_GET['name'] . '</h1>';
    }
}