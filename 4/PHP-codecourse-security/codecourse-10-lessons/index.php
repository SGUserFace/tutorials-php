<?php

//source https://www.youtube.com/watch?v=j-rQiXYJsH0&list=PLfdtiltiRHWFsPxAGO-SVPGhCbCwKWF_N&index=7

function print_resume($number, $txt) {
    echo 'Video ' . $number . ': ' . $txt;
    echo '<br>';
    echo '<br>';
}

/*
 * print lessons resume
 * <a href="url">link text</a>
 */
print_resume(1, 'do not use .inc extension files because their code can be browsed. '
        . '<br>');
print_resume(2, 'XSS (Cross-site Scripting)- stealing cookie values - '
        . '<br>requisites: '
        . '<br>->database field is not sanitized '
        . '<br>->the cookie cannot be set with paramenter httponly'
        . '<br>->i need to be be webmaster of site'
        . '<br>');
//require_once './2-xss.php';
//http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/index.php?username=alex
print_resume(3, 'password hashing '
        . '<br>');
print_resume(4, '.htaccess '
        . '<br>');
print_resume(5, 'HttpOnly Cookies '
        . '<br>');
require_once './5-http_only.php';
print_resume(6, 'what not to store in cookies '
        . '<br>->userid, for example ; it can be changed easily in browsers (chrome needs extension)'
        . '<br>->even cookies with httponly can be viewed on network tab'
        . '<br>');
print_resume(7, '<a href="https://www.youtube.com/watch?v=j-rQiXYJsH0&list=PLfdtiltiRHWFsPxAGO-SVPGhCbCwKWF_N&index=7">CSRF (Cross-site Request Forgery</a>'
        . '<br>how to avoid:'
        . '<br>->a) on the file that implements the sensitive code (ex: changing data on db), check'
        . 'if $_SERVER(REQUEST_METHOD === POST; if not, die(); this should be done using routing system'
        . '<br>->b) for each request (form submission), compare generated token');

require_once './7-csrf.php';
print_resume(8, '<a href="https://www.youtube.com/watch?v=mCwAsvNdPRs&index=8&list=PLfdtiltiRHWFsPxAGO-SVPGhCbCwKWF_N">User defined file includes</a>'
        . '<br>the use of the method file_get_content can potentially be a door to view the source code of php file, which normally we can´t see,'
        . 'through view \'source code of page\''
        . '<br>how to avoid:'
        . '<br>-> a)dont use the method'
        . '<br>-> b)if i have to use it, also use method in_array so that only allowed parameters can be met');
//require_once './8-User_defined_file_includes.php';

print_resume(9,'SQL injection');

print_resume(10,'Error reporting'
        . '<br>on production, go to php.ini and turn off display_error; if i cant do that, use ini_set(\'display_errors\',\'Off\') or error_reporting(0)');
/*
 * 8-Tests
 * http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/?show=dogs
 * source code will show credentials: http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/?show=../app/db
 * 
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php ?>
    </body>
</html>
