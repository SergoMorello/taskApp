<?php $this->include("htmlHead",array("name"=>"Задача")); ?>
<?php 
$arrTask = $this->controller->getTask(); 
if ($arrTask) {
	if ($this->controller->type=="ok") {
		?>
			<div class="alert alert-success" role="alert">
				Выполнено
			</div>
		<?php
	}
?>
	<div class="input-group mb-3">
		<div>
		<div class="form-floating mb-3">
			<input class="form-control" type="text" id="login" placeholder="Логин" value="<?php echo $arrTask['login']; ?>" disabled />
			<label for="login">Логин</label>
		</div>
		<div class="form-floating mb-3">
			<input class="form-control" type="text" id="email" placeholder="Почта" value="<?php echo $arrTask['email']; ?>" disabled />
			<label for="email">Почта</label>
		</div>
		<?php if ($this->controller->checkLoginUse()) { ?>
		<form method="post" action="/taskdo/update/<?php echo $arrTask['id']; ?>">
			<div class="form-floating mb-3">
				<textarea class="form-control" name="text" placeholder="Текст задачи"><?php echo $arrTask['text']; ?></textarea>
				<label for="text">Тексти задачи</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" name="stat" id="stat" <?php echo $arrTask['stat'] ? "checked" : ""; ?> />
				<label class="form-check-label" for="stat">Выполнено</label>
			</div>
			<div class="mb-3"><input type="submit" class="btn btn-primary" value="Сохранить"/></div>
		</form>
		<?php }else{ ?>
		<div class="form-floating mb-3">
			<input class="form-control" type="text" id="text" placeholder="Тексти задачи" value="<?php echo $arrTask['text']; ?>" disabled />
			<label for="text">Тексти задачи</label>
		</div>
		<?php } ?>
		</div>
	</div>
<?php
}
	
?>
<?php $this->include("htmlBottom"); ?>