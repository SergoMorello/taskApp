<?php
header('Content-Type: text/html; charset=utf-8');
require_once('inc_config.php');
require_once('inc/inc_database.php');
require_once('inc/core.php');
require_once('inc/model.php');
require_once('inc/controller.php');
require_once('inc/view.php');
require_once('inc/router.php');
require_once('inc/app.php');
require_once('routerConf.php');
app::run();