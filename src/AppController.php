<?php

require_once __DIR__ . '/Template.php';

class AppController
{
    /**
     * @return string
     */
    public function hello(): string
    {
        //$template = new Template(__DIR__ . '/../templates/hello.tpl.php');
        $template = new Template(__DIR__ . '/../templates/hello.tpl.php');

        // option 1
        $template
            ->setVar('name', $_GET['name'])
            ->setVar('lastName', 'ROUFF')
        ;

        // implement __get()
        var_dump($template->lastName);

        // option 2
        $template->school = 'EPITECH';

        // compiler le fichier .tpl vers du HTML
        return $template->render();
        //return '<h1>Hello ' . $_GET['name'] . '</h1>';
    }

    public function listUsers()
    {
        $template = new Template(__DIR__ . '/../templates/list_users.tpl.php');
        $template->extends(__DIR__ . '/../templates/layout.tpl.php');

        return $template->render();
    }
}