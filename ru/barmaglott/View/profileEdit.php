<?php include_once 'identification.php';?>
<script type="text/javascript">
function destroy()
{
if (confirm("Bы уверены, что хотите уничтожить эту страницу?"))
alert("Неужели вы думаете, что я позволю сделать это!?");
else
alert("Вопрос закрыт!") ;
}
</script>
<div id="page">
<div id="content">
<h2><?php echo $list['msg'];?></h2>
<form method="post"	action="<?php echo $_SERVER['PHP_SELF'] . '?edit';?>">
	
	<fieldset>
		<legend>Редактирование профиля.</legend>
		<?php $_POST['password'] = $_SESSION['user']->password?>
		<div>
		<label for="login">Ваш логин:</label> 
			<input type="text" name="login"	class="required" value="<?php echo $list['data']->login;?>" /><br /> 
		</div>
		
			
		<div>
		<label for="email">Ваша почта:</label>
			<input type="email" name="email"	class="validate-email required" value="<?php echo $list['data']->email;?>" />
		</div>
		<div>
			<label for="phone">Ваш телефон:</label>
			<input type="tel" name="phone" class="required" value="<?php echo $list['data']->phone;?>" /><br />
		</div>
	 <div class="submit">
     	<input type="submit" name="submit" value="Изменить" class="button" />
     </div>
	</fieldset>
	
</form>

<fieldset>
	<legend>Информация о пользователе</legend>
	<p style="font-weight:bold;">
	<?php

	$table = $list ['data'];
	
	//echo '<td>' . $table->id . '</td>';
	echo 'Роль: ' . $list['role'] . '<br />';
	echo 'Логин: ' . $table->login . '<br />';
	echo 'Почта: ' . $table->email . '<br />';
	echo 'Всего ' . $list['role_data'] .' : ' . count($table->list);
	?>
	</p>	
</fieldset>


<?php 
//echo '<ul>';
foreach ( $table->list as $table_list ) {
	echo '<h2>' . $table_list->title . '</h2>';
	echo '<blockquote>';
	echo '<p>';
	echo $table_list->depiction;
	echo '</p>';
	//echo '<input type="button" value="Уничтожить страницу" onclick="destroy();" >';
	echo '</blockquote>';
	
	//echo '<li>';
	//echo ' ' . $table_list->title . '  ' . $table_list->depiction;
	//echo '</li>';
	//echo '<tr>';
	// var_dump($table_list);
	//echo '<td>===></td>';
	//echo '<td>' . $table_list->title . '</td>';
	
	//echo '<td>' . $table_list->depiction . '</td>';
	//echo '</tr>';
}
//echo '</ul>';
// }
// echo '</table>';
?>
</div>
</div>