<?php
$router->get("/","home",function($obj) {
	$obj->view->show("home");
});
$router->get("/sort/{page}/{name}/{type}","home",function($obj) {
	$obj->view->show("home");
});
$router->get("/newtask","newtask",function($obj) {
	$obj->view->show("newtask");
});
$router->get("/task/{id}","task",function($obj) {
	$obj->view->show("task");
});
$router->get("/task/{id}/{type}","task",function($obj) {
	$obj->view->show("task");
});
$router->post("/taskdo/{type}/{id}","formTaskWorker",function($obj) {
	//$obj->redirect("/");
});
$router->get("/login/{type}","login",function($obj) {
	$obj->view->show("login");
});
$router->post("/login/do/{type}","formLoginWorker",function($obj){
	//$obj->redirect("/");
});
$router->get("/admin","admin",function($obj) {
	$obj->view->show("admin");
});