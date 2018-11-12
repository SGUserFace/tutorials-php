<?php 

if(isset($_GET['id'])){
	$id= $_GET['id'];
	$query = "SELECT email FROM users WHERE id = '$id'";
	$model = new Model();
    echo $model->selectFieldValueWhereParams($query);
}