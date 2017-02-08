<?php
//Общение php с SQL

//4 типа подключений файлов

//include = просто подключает файл. Если его не находит покажет, что файл не найден и продолжит выполнять код.
//include_jnce = тоже что и include, но если файл уже был подключен раньше, он его не подключит
//require = если файл не был найдет, выведет фатальную ошибку
//require_once = тоже что и require, но если файл уже был подключен раньше, он его не подключит

include('includes/db.php');
?>


<!--
	method = "GET" = если мало данных(логин, пароль)
	method = "POST" = если данных много
	action = "" = путь к обработчику
-->
<form method="POST" action="/handle.php">
	<input type="text" placeholder="Ваш логин" name="login">
	<input type="password" placeholder="Ваш пароль" name="password">
	<hr>
	<input type="submit" value="ОТПРАВИТЬ">
</form>