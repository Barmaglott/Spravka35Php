<p>Вы вошли в приложение как <?php echo $resIdent['data']->login;?>.</p> 
<p><a href="profile.php?edit">Редактировать профиль.</a></p>
<?php 
if($resIdent['data'] instanceof ru\barmaglott\DAO\Client) {
	echo $messClient;
	$addBid="";
}
if ($resIdent['data'] instanceof ru\barmaglott\DAO\Employee) {
	echo $messEmployee;
	$addBid='<a href="bid.php">Добавить заявку</a>';
}

?>   
<p><a href="logout.php" >Выйти.</a></p>