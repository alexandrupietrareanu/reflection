<?php

defined('ROOT_PATH') or define('ROOT_PATH', realpath(dirname(__FILE__)));
$autoload = ROOT_PATH.'/vendor/autoload.php';
if (is_file($autoload)) {
    require $autoload;
}

/**
 * PHP 5.4 ships with a built in web server for development. This server
 * allows us to run silex without any configuration. However in order
 * to server static files we need to handle it nicely
 */
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() == 'cli-server' && is_file($filename)) {
    return false;
}

use Reflection\Classes\Ticket;
$ticket = new Ticket();
$ticket->setName("Jira Desc");
$ticket->setDescription("Jira Ticket Desc");
var_dump($ticket);
die;