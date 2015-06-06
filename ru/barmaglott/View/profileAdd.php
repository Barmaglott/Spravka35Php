<div id="page">
<div id="content">
<h2><?php echo $list['msg'];?></h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?add';?>">
	
	<fieldset>
		<legend>Ваши данные.</legend>
		
			<label for="role">Ваша роль:</label>
			 <div class="radio" >
				<input type="radio" name="role" value="client" checked="checked"/>Заказчик.<br />
			
				<input type="radio" name="role" value="employee"/>Исполнитель.
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
			<input type="email" name="email"	class="validate-email required" 
			title="Пожалуйста, введите вашу элетронную почту. "value="<?php echo $list['data']->email;?>" />
		</div>
		<div>
			<label for="phone">Ваш телефон:</label>
			<input type="tel" name="phone" class="required" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" 
				title="Пожалуйста, введите номер вашего телефона в общепринятом формате. " value="<?php echo $list['data']->phone;?>" /><br />
		</div>
			 
                       
			 
     <div class="submit">
     	<input type="submit" name="submit" value="Создать" class="button" />
     </div>
                        
	</fieldset>
</form>
</div>
</div>