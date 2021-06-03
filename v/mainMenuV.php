<?php $link = $this->request()->route; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link<?php echo ($link=="") ? " active" : ""; ?>" href="/">Главная</a></li>
			<li class="nav-item"><a class="nav-link<?php echo ($link=="newtask") ? " active" : ""; ?>" href="/newtask">Новая задача</a></li>
			<li class="nav-item"><a class="nav-link<?php echo ($link=="login") ? " active" : ""; ?>" href="/login">Профиль</a></li>
		</ul>
	</div>
</nav>