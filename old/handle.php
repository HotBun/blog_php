<?php

//$_GET = суперглобальный массив. Принимает все значения из HTML переданные методом GET
//$_POST= суперглобальный массив. Принимает все значения из HTML переданные методом POST

//echo 'Ваш логин: ' . $_POST['login'] . '<br/>';
//echo 'Ваш пароль: ' . $_POST['password'] . '<br/>';

include('includes/db.php');


$login = $_POST['login'];
$password = $_POST['password'];

$count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` =  '$login' AND `password` =  '$password'");
exit("SELECT * FROM `users` WHERE `login` =  '$login' AND `password` =  '$password'");

if( mysqli_num_rows($count) == 0 ){
	echo "Вы не зарегистрированы <br/>";
} else{
	echo 'Привет, ' . $login . "<br/>";
}
