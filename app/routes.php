<?php

// Home page
$app->get('/', "TodoList\Controller\HomeController::indexAction")->bind('home');

//Signup Page
$app->match('/signup', "TodoList\Controller\HomeController::signupAction")->bind('signup');

//Login page 
$app->match('/login', "TodoList\Controller\HomeController::loginAction")->bind('login');

//Dasboard page 
$app->get('/dashboard', "TodoList\Controller\DashboardController::indexAction")->bind('dashboard');