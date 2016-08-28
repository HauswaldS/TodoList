<?php

namespace TodoList\Tests;

require_once __DIR__.'/../../vendor/autoload.php';

use Silex\WebTestCase;

class AppTest extends WebTestCase {

    /**
     * Checks if all Application URLs load succesfully. 
     * During the test execution, this method is called for each URL returned by the provideUrls method
     *
     * @dataProvider provideUrls
     */
     public function testPageIsSuccessful($url){
         $client = $this->createClient();
         $client->request('GET', $url);

         $this->assertTrue($client->getResponse()->isSuccessful());
     }

     /**
      * Configure and create an instance of the Silex application
      *
      * @inheritDoc
      */
      public function createApplication(){
          $app = new \Silex\Application();
          
          require __DIR__.'/../../app/config/dev.php';
          require __DIR__.'/../../app/app.php';
          require __DIR__.'/../../app/routes.php';

          //Generate raw exception instead of HTML pages 
          $app['exception_handler']->disable();
          //Simulate sessions for testing
          $app['session.test'] = true;
          
          return $app;
      }

      /**
       * Provide all valid application Urls
       *
       * @return array The list of all valid application Urls
       */
       public function provideUrls(){
           return array(
               array('/')
           );
       }


}