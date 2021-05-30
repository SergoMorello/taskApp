<?php $this->include("htmlHead",array("title"=>"Новая задача")); ?>
<h1>Новая задача</h1>
<?php $this->include("htmlMenu"); ?>
<div class="input-group mb-3">
	<form method="post" action="/add/submit">
		<div class="mb-3"><input class="form-control" type="text" name="login" placeholder="Логин" required /></div>
		<div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Почта"required /></div>
		<div class="mb-3"><textarea class="form-control" name="text" placeholder="Текст задачи" required ></textarea></div>
		<div class="mb-3"><input class="btn btn-primary" type="submit" value="Добавить"/></div>
	</form>
</div>
<?php $this->include("htmlBottom"); ?>