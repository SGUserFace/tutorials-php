<?php

echo 'view/home/index';
echo "<br><br>";
echo "all users:";
echo "<br><br>";
echo '<pre>' . print_r($data['user'], true);
echo "<br><br>";
echo 'was user 1 found ? ' . $data['found'];
echo "<br><br>";

?>

<a href="http://localhost/projeto/mvc_no_slash/public/user/create/1">create musician</a>
<a href="http://localhost/projeto/mvc_no_slash/public/user/create/2">create band</a>
<a href="http://localhost/projeto/mvc_no_slash/public/downloads/videos">download videos</a>


<?php


