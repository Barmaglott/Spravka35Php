<?php $addBid=""; ?>


<a href="profile.php?add">Создать профиль.</a>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
		<legend>Вход в приложение.</legend>
		<label for="user_name">Имя пользователя:</label> <input type="text"
			name="user_name"
			value="<?php if (!empty($user_name)) echo $user_name; ?>" /><br /> <label
			for="user_password">Пароль:</label> <input type="password"
			name="user_password" />
	</fieldset>
	<br />
	<div class="submit">
		<input type="submit" value="Войти" name="submit" />
	</div>
</form>


