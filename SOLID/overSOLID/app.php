<?php

require_once './Application.php';

$config = new Configuration();
$config->load('./config.ini');

//$app = Application::getInstance($config, new HtmlTableListPrinter());
$app = Application::getInstance($config);
$app->run();
