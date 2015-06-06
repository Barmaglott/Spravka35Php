
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
	<?php
	foreach ( $list['data'] as $table ) {
		// $_GET['id']==$table->id_order? $describe = $table->depiction: $describe = mb_substr( $table->depiction, 0, 15, "UTF-8").'...';
		$describe = $table->depiction;
		
		echo '<h2>' . $table->title . '</h2>';
		echo '<blockquote>';
		echo '<div class="info_box bg_color">';
			echo ' Заказчик: <a href="profile.php?role=client&login=' . $table->login . '">' . $table->login . '</a><br />';
			echo ' Дата:' . $table->date_create . '<br />';
		echo '</div>';
		echo '<p>';
			echo $describe;
		echo '</p>';
		
		echo '<p><a href="javascript:showHide(' . $table->id_order . ');">Заявок : ' . $table->num . '</a></p>';
		//echo '<p><a href="index.php">Заявок : ' . $table->num . '</a></p>';
		echo '<div id="' . $table->id_order . '" style="display:none">';
		//echo '<div>';
		echo '<table cellspacing = "15">';
		//if ($_GET ['id'] == $table->id_order) {
			//foreach ( $list['data_bid'] as $order ) {
				foreach ( $table->list as $table_bid ) {
					echo '<tr>';
					echo '<td><h5>Исполнитель:</h5></td>';
					echo '<td><a href="profile.php?role=employee&login=' . $table_bid->login . '">' . $table_bid->login . '</a></td>';
					//echo '<td><h4>Заголовок:</h4></td>';
					//echo '<td>' . $table_bid->title . '</td>';
					echo '<td><h5>Заявка:</h5></td>';
					echo '<td>' . $table_bid->depiction . '</td>';
					echo '</tr>';
				}
				//$_SESSION ['id'] = $table->id_order; // $order->id_order;
			//}
			echo '<tr>';
			echo '<td>';
			if ($addBid!=""){
				echo '<a href="' . $addBid . '?id=' . $table->id_order . '" > Добавить заявку</a>';
			}	
			echo '</td>';
			echo '</tr>';
		//} else
			
			//echo '<p><a href="' . $_SERVER ['PHP_SELF'] . '?id=' . $table->id_order . '">Заявок : ' . $table->num . '</a></p>';
		echo '</table>';
		echo '</div>';
		
		echo '</blockquote>';
		// Отображаем отзывы на заказ
		
		/*
		 * echo '<tr>';
		 * echo '<td><a href="profile.php?role=client&login=' . $table->login . '">' . $table->login . '</a></td>';
		 * echo '<td>' . $table->date_create . '</td>';
		 * echo '<td>' . $table->title . '</td>';
		 * echo '<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$table->id_order.'">' . $describe . '</a></td>';
		 * echo '<td>Заявок : ' . $table->num.'</td>';
		 *
		 * //Отображаем отзывы на заказ
		 * if ($_GET['id']==$table->id_order){
		 * foreach ($list['data_bid'] as $order){
		 * foreach ($order->list as $table_bid){
		 * echo '<tr>';
		 * echo '<td>===></td>';
		 * echo '<td><a href="profile.php?role=employee&login=' . $table_bid->login . '">' . $table_bid->login . '</a></td>';
		 * echo '<td>' . $table_bid->title . '</td>';
		 * echo '<td>' . $table_bid->depiction .'</td>';
		 * echo '</tr>';
		 * }
		 * $_SESSION['id'] = $order->id_order;//$order->id_order;
		 * }
		 * echo '<tr>';
		 * echo '<td>';
		 * echo $addBid;
		 * echo '</td>';
		 * echo '</tr>';
		 *
		 * }
		 * echo '</tr>';
		 */
	}
	?>
	</div>
</div>


