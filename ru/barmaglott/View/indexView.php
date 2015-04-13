<table>
	<?php 
	//echo $addBid;
		foreach ($list['data'] as $table){
			$_GET['id']==$table->id_order?	$describe = $table->describe_order:	$describe = mb_substr( $table->describe_order, 0, 15, "UTF-8").'...';
		echo '<tr>';
			echo '<td>' . $table->date_create . '</td>';
    		echo '<td>' . $table->title . '</td>';
    		echo '<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$table->id_order.'">' . $describe . '</a></td>';
    		echo '<td>Заявок : ' . $table->numBid.'</td>';
    		//Отображаем отзывы на заказ
    		if ($_GET['id']==$table->id_order){
    			
    			foreach ($list['data_bid'] as $order){
    				foreach ($order->listBid as $table_bid){
    			
    				echo '<tr>';
    					//echo '<td>' . $table->date_create . '</td>';
    					echo '<td>' . $table_bid->title . '</td>';
    					echo '<td>' . $table_bid->describe_bid .'</td>';
    				echo '</tr>';
    				}
    			}
    			echo '<tr>';
    					echo '<td>';
    						echo $addBid;
    					echo '</td>';
    			echo '</tr>';
    		}
  		echo '</tr>';
  		 }?>
</table>