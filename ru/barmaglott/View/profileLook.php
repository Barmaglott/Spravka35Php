<div id="page">
<div id="content">
<fieldset>
	<legend>Информация о пользователе</legend>
	<p style="font-weight:bold;">
	<?php

	$table = $list ['data'];
	
	//echo '<td>' . $table->id . '</td>';
	echo 'Роль: ' . $list['role'] . '<br />';
	echo 'Логин: ' . $table->login . '<br />';
	echo 'Почта: <a href="mailto:' . $table->email .'">' . $table->email . '</a><br />';
	echo 'Всего ' . $list['role_data'] .' : ' . count($table->list);
	?>
	</p>	
</fieldset>


<?php 
//echo '<ul>';
foreach ( $table->list as $table_list ) {
	//echo '<li>';
	//echo ' ' . $table_list->title . '  ' . $table_list->depiction;
	//echo '</li>';
	
	echo '<h2>' . $table_list->title . '</h2>';
	echo '<blockquote>';
	if ($table_list->selected==1){
		
		echo '<div class="info_box bg_color">';
		echo 'Заявка принята к исполнению .<br />'.'Заказ №' . $table_list->fk_id_order;
		echo '</div>';
	}
	echo '<p>';
	echo $table_list->depiction;
	echo '</p>';
	
	
	echo '</blockquote>';
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

