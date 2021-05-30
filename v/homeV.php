<?php $this->include("htmlHead",array("title"=>"Главная")); ?>
<h1>Главная</h1>
<?php $this->include("htmlMenu"); ?>
<?php $listTasks = $this->controller->getList();
if ($listTasks) {
	$page = $this->controller->propRequest->page ? $this->controller->propRequest->page : 0;
	echo "<table class='table'>";
	echo "<thead>";
	echo "<tr><th scope='col'><a href='/sort/".$page."/0/".($this->controller->propRequest->type ? 0 : 1)."'>Логин</a></th>
	<th scope='col'><a href='/sort/".$page."/1/".($this->controller->propRequest->type ? 0 : 1)."'>Почта</a></th>
	<th scope='col'><a href='/sort/".$page."/2/".($this->controller->propRequest->type ? 0 : 1)."'>Статус</a></th></tr>";
	echo "</tbody>";
	foreach($listTasks as $task) {
		echo "<tr><td><a href='/task/".$task['id']."'>".$task['login']."</a></td><td>".$task['email']."</td><td>".$this->controller->statName($task['stat'])."</td></tr>";
	}
	echo "</table>";
	$arrPages = $this->controller->listPages();
	if ($arrPages) {
		?>
		<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
			<div class="btn-group mr-2" role="group" aria-label="First group">
		<?php
		$strSortParams = ($this->controller->propRequest->name ? $this->controller->propRequest->name : 0)."/".($this->controller->propRequest->type ? $this->controller->propRequest->type : 0);
		if ($arrPages['pagination']['past'])
			echo "<a href='/sort/".$arrPages['pagination']['past']."/".$strSortParams."' class='btn btn-secondary'>...</a>";
		foreach($arrPages['pages'] as $page) {
			echo "<a href='/sort/".$page['name']."/".$strSortParams."' class='btn btn-secondary".($page['select'] ? " active" : "")."'>".$page['name']."</a>";
		}
		if ($arrPages['pagination']['last'])
			echo "<a href='/sort/".$arrPages['pagination']['last']."/".$strSortParams."' class='btn btn-secondary'>...</a>";
		?>
			</div>
		</div>
		<?php
	}
}
?>
<?php $this->include("htmlBottom"); ?>