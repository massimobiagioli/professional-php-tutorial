<?php declare(strict_types=1);

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::DEVELOPMENT);

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$controller = new \SocialNews\FrontPage\Presentation\FrontPageController();
$response = $controller->show($request);

if (!$response instanceof \Symfony\Component\HttpFoundation\Response)
{
    throw new \Exception('Controller methods must return a Response Object');
}

$response->prepare($request);
$response->send();