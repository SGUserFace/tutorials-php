Create User 

<?php
echo "<br><br>";
$type = $data[0];

if ($_POST) {
    echo 'posted data on view: ';
    echo '<pre>' . print_r($_POST, true);
    $name = $_POST['name'];
    $age = $_POST['age'];

    $controller = new UserController;
    $controller->create($type, ['name' => $name, 'age' => $age]);
}
?>

<form action="" method="post">
    <label>name</label><input type="text" name="name" size="10">
    <label>age</label><input type="text" name="age" size="10">
    <input type="submit" value="ok"> 
</form>