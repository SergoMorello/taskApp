<?php
header('Content-Type: text/html; charset=utf-8');
require_once('inc_config.php');
require_once('inc/inc_database.php');
//$dblink = new database();
//$dblink->connect();
require_once('inc/core.php');
require_once('inc/model.php');
require_once('inc/controller.php');
require_once('inc/view.php');
require_once('inc/router.php');
$router = new router;
require_once('routerConf.php');
$router->run();
//$dblink->disconnect();