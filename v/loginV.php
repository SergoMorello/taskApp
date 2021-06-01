<?php $this->include("htmlHead",array("name"=>"Профиль")); ?>
<?php 
if ($this->controller->get['type']=="error") {
?>
	<div class="alert alert-warning" role="alert">
		Вход не выполнен
	</div>
<?php
}
?>
<div class="input-group mb-3">
	<?php
		if ($rowUser=$this->controller->checkLogin) {		
	?>
	<form method="post" action="/login/do/logout">
		<div class="form-floating mb-3">
			<input class="form-control" type="text" id="login" placeholder="Логин" value="<?php echo $rowUser['login']; ?>" disabled />
			<label for="login">Логин</label>
		</div>
		<div class="mb-3"><input class="btn btn-primary" type="submit" value="Выйти"/></div>
	</form>
	<?php
		}else{
			
	?>
	<form method="post" action="/login/do/submit" autocomplete="off">
		<div class="form-floating mb-3">
			<input class="form-control" type="text" name="login" id="login" placeholder="Логин" required />
			<label for="login">Логин</label>
		</div>
		<div class="form-floating mb-3">
			<input class="form-control" type="password" name="password" id="password" placeholder="Пароль" required />
			<label for="password">Пароль</label>
		</div>
		<div class="mb-3"><input class="btn btn-primary" type="submit" value="Войти"/></div>
	</form>
	<?php } ?>
</div>
<?php $this->include("htmlBottom"); ?>