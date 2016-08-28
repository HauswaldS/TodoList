<?php

// Home page
$app->get('/', "TodoList\Controller\HomeController::indexAction")->bind('home');