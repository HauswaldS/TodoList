<?php

namespace TodoList\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use TodoList\Domain\User;
use TodoList\Form\Type\SignupType;

class HomeController {

    /**
     * Home page controller
     *
     * @param Application $app Silex application
     *
     */
     public function indexAction(Application $app){
         return $app['twig']->render('index.html.twig', array(
             'title'    => 'Home'
         ));
     }

     /**
      * Login page controller
      *
      * @param Request $request Incoming request
      * @param Application $app Silex application
      */
      public function loginAction(Request $request, Application $app){
          return $app['twig']->render('login.html.twig', array(
              'error'           => $app['security.last_error']($request),
              'last_username'   => $app['session']->get('_security.last_username')
          ));
      }

     /**
      * Signup page controller
      *
      * @param Request $request The incoming request
      * @param Application $app Silex application
      */
      public function signupAction(Request $request, Application $app){
          $user = new User();
          $signupForm = $app['form.factory']->create(new SignupType, $user);
          $signupForm->handleRequest($request);
          if($signupForm->isSubmitted() && $signupForm->isValid()){
              $user->setRole('ROLE_USER');
              $salt = substr(md5(time()), 0, 23);
              $user->setSalt($salt);
              $encoder = $app['security.encoder.digest'];
              $plainPassword = $user->getPassword();
              $password = $encoder->encodePassword($plainPassword, $user->getSalt());
              $user->setPassword($password);
              $app['dao.user']->save($user);
              $app['session']->getFlashBag()->add('success', "You have been succesfully registered !");
          }
          return $app['twig']->render('signup_form.html.twig', array(
              'signupForm' => $signupForm->createView()
          ));
      }
}