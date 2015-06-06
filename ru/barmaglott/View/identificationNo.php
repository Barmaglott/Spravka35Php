<?php $addBid=""; ?>



<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
		<legend>Вход в приложение.</legend>
		<label for="radio">Ваша роль:</label><br />
		<div  >
			 	
				<input type="radio" name="role" value="client" checked="checked" style="width: 0"/>Заказчик.<br />
			
				<input type="radio" name="role" value="employee" style="width: 0"/>Исполнитель.
			</div>
			 
			 	
				
		
		
		<label for="user_name">Имя пользователя:</label>
			<input type="text" name="user_name" value="<?php if (!empty($user_name)) echo $user_name; ?>" /><br /> 
		<label for="user_password">Пароль:</label> 
			<input type="password"	name="user_password" />
		
		<div class="submit">
			<input type="submit" value="Войти" name="submit" />
		</div>
	</fieldset>
	
</form>


