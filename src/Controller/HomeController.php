<?php

namespace TodoList\Controller;

use Silex\Application;

class HomeController {

    /**
     * Render the template for the homepage
     *
     * @param Application $app Silex application
     *
     */
     public function indexAction(Application $app){
         return $app['twig']->render('index.html.twig', array(
             'title'    => 'Home'
         ));
     }
}