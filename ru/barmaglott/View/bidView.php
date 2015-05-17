<div id="page">
	<div id="content">
<?php
// $orderView = $list['data'];
//echo '<table>';
foreach ( $list ['data'] as $orderView ) {
	echo '<h2>' . $orderView->title . '</h2>';
	echo '<blockquote>';
	echo '<div class="info_box bg_color">';
		echo ' Posted by: <a href="profile.php?role=client&login=' . $orderView->login . '">' . $orderView->login . '</a><br />';
		echo ' Date:' . $orderView->date_create . '<br />';
	echo '</div>';
	//echo '<td>' . $orderView->date_create . '</td>';
	//echo '<td>' . $orderView->title . '</td>';
	echo '<p>';
	echo $orderView->depiction;
	echo '</p>';
	//echo '<td>' . $orderView->depiction . '</td>';
	echo '<p>Заявок : ' . $orderView->num . '</p>';
	echo '<table cellspacing = "15">';
	foreach ( $orderView->list as $bid ) {
		
		echo '<tr>';
		echo '<td><h5>Исполнитель:</h5></td>';
		echo '<td><a href="profile.php?role=employee&login=' . $bid->login . '">' . $bid->login . '</a></td>';
		// echo '<td>' . $table->date_create . '</td>';
		echo '<td><h5>Заявка:</h5></td>';
		echo '<td>' . $bid->depiction . '</td>';
		echo '</tr>';
	}
	
	
}
echo '</table>';


echo '</blockquote>';
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<fieldset>
		<legend>Добавление заявки.</legend>
		<div>	
			<label for="title">Заголовок:</label>
				<input type="text" id="title" name="title" class="required"
					value="<?php if(!empty($_POST['title'])) echo $_POST['title']; ?>" />
		</div>
		<div>
			<label for="describe_bid">Заявка:</label>
				<textarea name="describe_bid" rows="10" cols="50" class="required" ></textarea>
		</div>
		<div class="submit">
			<input type="submit" value="Добавить" name="submit" class="button">
		</div>
	</fieldset>
</form>
</div>
</div>
