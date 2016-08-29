<?php

namespace TodoList\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use TodoList\Domain\Task;
use TodoList\DAO\TaskDAO;
use TodoList\Domain\Folder;
use TodoList\DAO\FolderDAO;

class DashboardController {

    /**
     * Dashboard page
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
     public function indexAction(Request $request, Application $app){
         $folders = null;
         $tasks = null;
         return $app['twig']->render('dashboard.html.twig', array(
             'tasks'   => $tasks,
             'folders' => $folders
         ));
     }

     public function addFolderAction(Request $request, Application $app){
         
     }
}