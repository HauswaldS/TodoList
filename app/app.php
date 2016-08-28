<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.

//Silex Form 
$app->register(new Silex\Provider\FormServiceProvider());
// Needed to use Silex Form
$app->register(new Silex\Provider\TranslationServiceProvider());
//DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());
//Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
// Allow usage of path('')
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
//Form Validator
$app->register(new Silex\Provider\ValidatorServiceProvider());
//Silex Session
$app->register(new Silex\Provider\SessionServiceProvider());
//Silex security
// $app->register(new Silex\Provider\SecurityServiceProvider(), array(
//     'security.firewalls' => array(
//         'secured' => array(
//             'pattern' => '^/',
//             'anonymous' => true,
//             'logout' => true,
//             'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
//             'users' => $app->share(function () use ($app){
//                 return new MicroCMS\DAO\UserDAO($app['db']);
//             }),
//         ),
//     ),
//     'security.role.hierarchy' => array(
//         'ROLE_ADMIN' => array('ROLE_USER'),
//     ),
//     'security.access_rules' => array(
//         array('^/dashboard', 'ROLE_USER'),
//     ),
// ));
//Implement Monolog to create logfiles
$app->register(new Silex\Provider\MonologServiceProvider(), array (
    'monolog.logfile' => __DIR__.'/../var/logs/microcms.log',
    'monolog.name'    => 'TODOLIST',
    'monolog.level'   => $app['monolog.level']
));
//Implements Silex webprofiler (allows to use symfony toolbar)
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
//Only if the app is in debug mode
if(isset($app['debug']) && $app['debug']){
    $app->register(new Silex\Provider\HttpFragmentServiceProvider());
    $app->register(new Silex\Provider\WebProfilerServiceProvider(), array(
        'profiler.cache_dir' => __DIR__.'/../var/cache/profiler'
    ));
}

// Register services.



// //Register JSON data decoder for JSON requests
// $app->before(function (Request $request){
//     if(0 === strpos($request->headers->get('Content-Type'), 'application/json')){
//         $data = json_decode($request->getContent(), true);
//         $request->request->replace(is_array($data) ? $data : array());
//     }
// });

//Register error handler 

// $app->error(function (\Exception $e, $code) use ($app) {
//     switch($code){
//         case 403:
//             $message = "Access denied.";
//             break;
//         case 404:
//             $message = "The requested resource could not be found.";
//             break;
//         default:
//             $message = "Something went wrong.";
//     }   
//     return $app['twig']->render('error.html.twig', array(
//         'message' => $message
//     ));
// });