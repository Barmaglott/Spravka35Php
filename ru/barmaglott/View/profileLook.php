<div id="page">
<div id="content">
<fieldset>
	<legend>Contact Information</legend>
	<p style="font-weight:bold;">
	<?php

	$table = $list ['data'];
	
	//echo '<td>' . $table->id . '</td>';
	echo 'Role: ' . $list['role'] . '<br />';
	echo 'Login: ' . $table->login . '<br />';
	echo 'E-mail: ' . $table->email . '<br />';
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

