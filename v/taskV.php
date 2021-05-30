<?php $this->include("htmlHead",array("title"=>"Задача")); ?>
<h1>Задача</h1>
<?php $this->include("htmlMenu"); ?>
<?php 
$arrTask = $this->controller->getTask(); 
if ($arrTask) {
?>
	<div>
		<div>Логин: <?php echo $arrTask['login']; ?></div>
		<div>Почта: <?php echo $arrTask['email']; ?></div>
		<?php if ($this->controller->checkLoginUse()) { ?>
		<form method="post" action="/task/<?php echo $arrTask['id']; ?>/update">
			<div><textarea name="text" placeholder="Текст задачи"><?php echo $arrTask['text']; ?></textarea></div>
			<div><label><input type="checkbox" name="stat" <?php echo $arrTask['stat'] ? "checked" : ""; ?>>Выполнено</label></div>
			<div><input type="submit" value="Сохранить"/></div>
		</form>
		<?php }else{ ?>
		<div>Тексти задачи: <?php echo $arrTask['text']; ?></div>
		<?php } ?>
	</div>
<?php
}
	
?>
<?php $this->include("htmlBottom"); ?>