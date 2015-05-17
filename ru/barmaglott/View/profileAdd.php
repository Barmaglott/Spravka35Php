<div id="page">
<div id="content">
<h2><?php echo $list['msg'];?></h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?add';?>">
	
	<fieldset>
		<legend>Ваши данные.</legend>
		
			<label for="role">Ваша роль:</label>
			 <div class="radio">
				<input type="radio" name="role" value="client" checked="checked">Заказчик.<br />
			
				<input type="radio" name="role" value="employee">Исполнитель.
			</div>
		<div>
		<label for="login">Ваш логин:</label> 
			<input type="text" name="login"	class="required" value="<?php echo $list['data']->login;?>" /><br /> 
		</div>
		<div>
		<label for="password">Ваш пароль:</label> 
			<input type="text" name="password" class="required" value="<?php echo $list['data']->password;?>" /><br />
		</div>
		<div>
		<label for="email">Ваша почта:</label>
			<input type="text" name="email"	class="validate-email required" value="<?php echo $list['data']->email;?>" />
		</div>
			 
                       
			 
     <div class="submit">
     	<input type="submit" name="submit" value="Создать" class="button" />
     </div>
                        
	</fieldset>
</form>
</div>
</div>