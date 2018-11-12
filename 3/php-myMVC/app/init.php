<?php

error_reporting(1);

session_start();

require_once 'database/MySqlRepository.php';

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';

require_once 'helpers/Presentation.php';
require_once 'helpers/Security.php';
require_once 'helpers/Project.php';
require_once 'helpers/Redirect.php';
