<?php
if (!isset($_GET['show'])) {
    echo '$_GET[\'show\'] not set';
    die();
}
$f = $_GET['show'];

/*
 * *****************************************************
 * wrong
 * *****************************************************
 * 
 * source code will show db credentials when ?show=../app/db
 * *****************************************************
 */
//$content = file_get_contents("8-udfi/" . $f . ".php");

/*
 * *****************************************************
 * rigth
 * *****************************************************
 * 
 * safer alternative -> $content=include '8-udfi/' . $f . '.php';  <- safer alternative
 * *****************************************************
 */

$allowed = array(
    'dogs',
    'cats'
);

if (in_array($f, $allowed)) {
    $content = file_get_contents("8-udfi/" . $f . ".php");
} else {
    $content = 'user defined file includes';
}


/*
 * *****************************************************
 * printing
 * *****************************************************
 */
?>
<!DOCTYPE html>

<html>
    <head>

    </head>
    <body>
        <?php echo $content; ?>
    </body>
</html>


