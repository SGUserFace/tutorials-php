<?php
echo '... in delete.php ...<br>';
require '../app/db.php';

/*
 * start of solution
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('fuck');
}

/*
 * end of solution
 */

$delete = $db->prepare("UPDATE users_security SET active=active+1 WHERE id=:id");

$delete->execute([
    'id' => $_SESSION['id']
]);

echo '<br><br>shit just happened';

