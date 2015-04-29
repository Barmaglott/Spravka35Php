<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
		<legend>Добавление заказа.</legend>
		<label for="title">Название заказа:</label>
			<input type="text" name="title" /><br />
		<label for="describe_order">Краткое описание заказа:</label>
			<input type="text" name="describe_order" />
	</fieldset>
	<input type="submit" value="Добавить" name="submit" />
</form>
<table>
	<?php 
		foreach ($list['data'] as $table){
    	echo '<tr>';
    		echo '<td>' . $table->title . '</td>';
    		echo '<td>' . $table->depiction . '</td>';
    		echo '<td>' . $table->date_create . '</td>';
    		echo '<td>Заявок : ' . count($table->list) . '</td>';
  		echo '</tr>';
  		 }?>
</table>


