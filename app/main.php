<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/composer/vendor/autoload.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/router.php';
Router::run();
