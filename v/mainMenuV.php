<?php $link = "/".$this->request()->route; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link<?php echo ($link==$this->controller->url("home")) ? " active" : ""; ?>" href="{{url('home')}}">Главная</a></li>
			<li class="nav-item"><a class="nav-link<?php echo ($link==$this->controller->url("newTask")) ? " active" : ""; ?>" href="{{url('newTask')}}">Новая задача</a></li>
			<li class="nav-item"><a class="nav-link<?php echo ($link==$this->controller->url("login")) ? " active" : ""; ?>" href="{{url('login')}}">Профиль</a></li>
		</ul>
	</div>
</nav>