<?php

require_once __DIR__ . '/Template.php';
require_once __DIR__ . '/Service/DB.php';
require_once __DIR__ . '/Model/User.php';

class AppController
{
    /**
     * @var PDO
     */
    private $dbConnection;

    public function __construct()
    {
        $db = new DB('sqlite:' . __DIR__ . '/../training.db', null, null);
        $this->dbConnection = $db->getConnection();
    }

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
        $query = $this->dbConnection->prepare('SELECT * from User');
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        //var_dump($users);die;

        $template = new Template(__DIR__ . '/../templates/list_users.tpl.php');
        $template->extends(__DIR__ . '/../templates/layout.tpl.php');

        $template->users = $users;

        return $template->render();
    }

    public function editUser()
    {
        $query = $this->dbConnection->prepare('SELECT * from User WHERE id=:id');
        $query->execute([':id' => $_GET['id']]);
        $user = $query->fetchObject('User');
        $template = new Template(__DIR__.'/../templates/add_user.tpl.php');
        $template->extends(__DIR__.'/../templates/layout.tpl.php');

        $template
            ->setVar('is_edit', true)
            ->setVar('user', $user)
        ;

        return $template->render();
    }

    public function addUser()
    {
        $template = new Template(__DIR__.'/../templates/add_user.tpl.php');
        $template->extends(__DIR__.'/../templates/layout.tpl.php');

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $query = $this->dbConnection->prepare('INSERT INTO User (firstName, lastName, email) VALUES (:firstName, :lastName, :email)');
            //option 1
            //$query->bindParam(':firstName', $_POST['first_name'], PDO::PARAM_STR);
            //$query->bindParam(':lastName', $_POST['last_name']);
            //$query->bindParam(':email', $_POST['email']);
            // OR option 2
            $query->execute([
                ':firstName' => $_POST['first_name'],
                ':lastName' => $_POST['last_name'],
                ':email' => $_POST['email']
            ]);
            //$rows = $query->fetchAll();
            $userId = $this->dbConnection->lastInsertId();

            var_dump($_POST, $userId);
        }

        return $template->render();
    }
}