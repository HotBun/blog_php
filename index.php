<?php
//Общение php с SQL

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