<?php $this->include("htmlHead",array("title"=>"Форма входа")); ?>
<h1>Форма входа</h1>
<?php $this->include("htmlMenu");

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
		if ($this->controller->checkLoginUse()) {
	?>
	<form method="post" action="/login/do/logout">
		<div><input class="btn btn-primary" type="submit" value="Выйти"/></div>
	</form>
	<?php
		}else{
			
	?>
	<form method="post" action="/login/do/submit">
		<div class="mb-3"><input class="form-control" type="text" name="login" placeholder="Логин" required /></div>
		<div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Пароль" required /></div>
		<div class="mb-3"><input class="btn btn-primary" type="submit" value="Войти"/></div>
	</form>
	<?php } ?>
</div>
<?php $this->include("htmlBottom"); ?>