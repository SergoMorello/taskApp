<?php $this->include("htmlHead",array("name"=>"Новая задача")); ?>
<div class="input-group mb-3">
	<form method="post" action="/taskdo/add/">
		<div class="form-floating mb-3">
			<input class="form-control" type="text" name="login" id="login" placeholder="Логин" required />
			<label for="login">Логин</label>
		</div>
		<div class="form-floating mb-3">
			<input class="form-control" type="text" name="email" id="email" placeholder="Почта" required />
			<label for="email">Почта</label>
		</div>
		<div class="form-floating mb-3">
			<textarea class="form-control" name="text" id="text" placeholder="Текст задачи" required ></textarea>
			<label for="text">Текст задачи</label>
		</div>
		<div class="mb-3"><input class="btn btn-primary" type="submit" value="Добавить"/></div>
	</form>
</div>
<?php $this->include("htmlBottom"); ?>