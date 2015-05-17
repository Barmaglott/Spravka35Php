
<script type="text/javascript">
function showHide(element_id){
	var obj = document.getElementById(element_id);
	if(obj.style.display=="none"){
		obj.style.display = "block";
	}else{
		obj.style.display = "none";
	}		
}

</script>
<div id="page">
	<div id="content">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
		<legend>Добавление заказа.</legend>
		<div>
			<label for="title">Название заказа:</label> 
				<input type="text"	name="title" class="required"/>
		</div>
		<div>
			<label for="describe_order">Краткое описание заказа:</label> 
				<textarea name="describe_order" rows="10" cols="50" class="required" ></textarea>
		</div>
		<div class="submit">
			<input type="submit" value="Добавить" name="submit" class="button"/>	
		</div>
	</fieldset>
	
</form>
<h2>Ваши заказы:</h2>
	<?php
		
	foreach ( $list['data'] as $table ) {
		$describe = $table->depiction;
		echo '<h2>' . $table->title . '</h2>';
		echo '<blockquote>';
			echo '<p>';
				echo $describe;
			echo '</p>';
			echo '<p><a href="javascript:showHide(' . $table->id_order . ');">Заявок : ' . $table->num . '</a></p>';
			echo '<div id="' . $table->id_order . '" style="display:none">';
				echo '<table cellspacing = "15">';
				foreach ( $table->list as $table_bid ) {
					echo '<tr>';
						echo '<td><h5>Исполнитель:</h5></td>';
						echo '<td><a href="profile.php?role=employee&login=' . $table_bid->login . '">' . $table_bid->login . '</a></td>';
						echo '<td><h5>Заявка:</h5></td>';
						echo '<td>' . $table_bid->depiction . '</td>';
					echo '</tr>';
				}
		
				echo '</table>';
			echo '</div>';
		echo '</blockquote>';
	}
	?>
</div>	
</div>
 