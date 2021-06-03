<?php
router::get("/","home",function($obj) {
	return view::show("home");
});
router::get("/sort/{page}/{name}/{type}","home",function($obj) {
	return view::show("home");
});
router::get("/newtask","login",function($obj) {
	return view::show("newtask");
});
router::get("/task/{id}","task",function($obj) {
	return view::show("task");
});
router::get("/task/{id}/{type}","task",function($obj) {
	return view::show("task");
});
router::post("/taskdo/{type}/{id}","formTaskWorker");

router::get("/login/{type}","login",function($obj) {
	return view::show("login");
});
router::post("/login/do/{type}","formLoginWorker");

router::get("/admin","admin",function($obj) {
	return view::show("admin");
});