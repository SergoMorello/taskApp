<?php
$router->get("/","home",function($obj) {
	$obj->view->show("home");
});
$router->get("/sort/{page}/{name}/{type}","home",function($obj) {
	$obj->view->show("home");
});
$router->post("/add/submit","formTaskWorker",function($obj){
	$obj->redirect("/");
});
$router->get("/add","formAdd",function($obj) {
	$obj->view->show("formAdd");
});
$router->get("/task/{id}","task",function($obj) {
	$obj->view->show("task");
});
$router->post("/task/{id}/update","formTaskWorker",function($obj) {
	//$obj->redirect("/");
});
$router->get("/login/{type}","login",function($obj) {
	$obj->view->show("login");
});
$router->post("/login/do/{type}","formLoginWorker",function($obj){
	//$obj->redirect("/");
});
// $router->post("/login/logout","formLoginWorker",function($obj){
	// $obj->redirect("/");
// });
$router->get("/admin","admin",function($obj) {
	$obj->view->show("admin");
});