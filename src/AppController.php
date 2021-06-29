<?php

require_once __DIR__ . '/Template.php';
require_once __DIR__ . '/Service/DB.php';
require_once __DIR__ . '/Model/User.php';

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
        $db = new DB('sqlite:' . __DIR__ . '/../training.db', null, null);
        $connection = $db->getConnection();
        $query = $connection->prepare('SELECT * from User');
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        //var_dump($users);die;

        $template = new Template(__DIR__ . '/../templates/list_users.tpl.php');
        $template->extends(__DIR__ . '/../templates/layout.tpl.php');

        $template->users = $users;

        return $template->render();
    }
}