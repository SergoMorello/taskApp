<?php
$router->get("/","home",function($obj){
	view::show("home");
});
$router->get("/sort/{page}/{name}/{type}","home",function($obj) {
	view::show("home");
});
$router->get("/newtask","newtask",function($obj) {
	view::show("newtask");
});
$router->get("/task/{id}","task",function($obj) {
	view::show("task");
});
$router->get("/task/{id}/{type}","task",function($obj) {
	view::show("task");
});
$router->post("/taskdo/{type}/{id}","formTaskWorker");

$router->get("/login/{type}","login",function($obj) {
	view::show("login");
});
$router->post("/login/do/{type}","formLoginWorker");

$router->get("/admin","admin",function($obj) {
	view::show("admin");
});