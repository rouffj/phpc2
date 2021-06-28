<?php

require __DIR__ . '/../src/AppController.php';

$appController = new AppController();

if (!isset($_GET['action'])) {
    exit('An action should be added like "localhost:8000/index.php?action=index" and "index" should be a method of AppController::index()');
}

// Call dynamically (through {}) the method from AppController matching the action from the url
$response = $appController->{$_GET['action']}();

header('Content-Type: text/html; charset=utf-8');
echo $response;
