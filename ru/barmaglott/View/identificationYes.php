<!-- 
<p>Вы вошли в приложение как <?php echo $resIdent['data']->login;?>.</p>
<p>
	<a href="profile.php?edit">Редактировать профиль.</a>
</p>
<?php
if ($resIdent ['data'] instanceof ru\barmaglott\DAO\Client) {
	echo $messClient;
	//$messNav = '<p><a href="order.php">Вашы заказы</a></p>';
	
	$addBid = "";
}
if ($resIdent ['data'] instanceof ru\barmaglott\DAO\Employee) {
	echo $messEmployee;
	//$messNav = '<p>Чтобы добавить заявку выберете заказ.</p>';
	$addBid = "bid.php";
}

?>
<p>
	<a href="logout.php">Выйти.</a>
</p>
 -->
 <?php
if ($resIdent ['data'] instanceof ru\barmaglott\DAO\Client) {
	echo $messClient;
	$addBid = "";
}
if ($resIdent ['data'] instanceof ru\barmaglott\DAO\Employee) {
	echo $messEmployee;
	$addBid = "bid.php";
}

?>
<ul>
	<li class="widget widget_links" id="links">
    <h2>Ваш профиль.</h2>
    <ul>
    	<li><a>Вы вошли в приложение как <?php echo $resIdent['data']->login;?>.</a></li>
        <li><a href="profile.php?edit">Редактировать профиль.</a></li>
        <li><a href="logout.php">Выйти.</a></li>
    </ul>
    </li>
</ul>