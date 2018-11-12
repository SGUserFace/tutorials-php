<?php

//spl_autoload_register(function ($class) {
//
//    $sources = [
//        "dataAccess/$class.php",
//        "model/$class.php ",
//        "controller/$class.php "
//    ];
//
//    foreach ($sources as $source) {
//        if (file_exists($source)) {
//            require_once $source;
//        }
//    }
//});

require_once 'dataAccess/MySqlRepository.php';
require_once 'dataAccess/UserDataAccess.php';

require_once 'core/App.php';

require_once 'core/Controller.php';

