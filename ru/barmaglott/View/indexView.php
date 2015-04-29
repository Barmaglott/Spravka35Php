<table>
	<?php 
	foreach ($list['data'] as $table){
			$_GET['id']==$table->id_order?	$describe = $table->depiction:	$describe = mb_substr( $table->depiction, 0, 15, "UTF-8").'...';
		echo '<tr>';
			echo '<td><a href="profile.php?role=client&login=' . $table->login . '">' . $table->login . '</a></td>';
			echo '<td>' . $table->date_create . '</td>';
    		echo '<td>' . $table->title . '</td>';
    		echo '<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$table->id_order.'">' . $describe . '</a></td>';
    		echo '<td>Заявок : ' . $table->num.'</td>';
    		//Отображаем отзывы на заказ
    		if ($_GET['id']==$table->id_order){
    			foreach ($list['data_bid'] as $order){
    				foreach ($order->list as $table_bid){
    				echo '<tr>';
    					echo '<td>===></td>'; 
    					echo '<td><a href="profile.php?role=employee&login=' . $table_bid->login . '">' . $table_bid->login . '</a></td>';
    					echo '<td>' . $table_bid->title . '</td>';
    					echo '<td>' . $table_bid->depiction .'</td>';
    				echo '</tr>';
    				}
    			$_SESSION['id'] = $order->id_order;//$order->id_order;
    			}
    			echo '<tr>';
    					echo '<td>';
    						echo $addBid;
    					echo '</td>';
    			echo '</tr>';
    			
    		}
  		echo '</tr>';
  	 }
  	 ?>
</table>